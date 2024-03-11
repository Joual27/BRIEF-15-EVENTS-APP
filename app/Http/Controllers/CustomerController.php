<?php

namespace App\Http\Controllers;

use App\Mail\Ticket;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{

    public function events()
    {
        return view('customer.events');
    }
    public function allEvents(){
        $events = Event::select(
            'events.*',
            DB::raw('(events.number_of_seats - COALESCE((SELECT COUNT(*) FROM reservations WHERE reservations.event_id = events.id AND reservations.validated_at IS NOT NULL), 0)) as available_seats')
        )
            ->join('organizers', 'events.organizer_id', '=', 'organizers.id')
            ->leftJoin('users', 'organizers.user_id', '=', 'users.id')
            ->where('date', '>', now())
            ->whereNotNull('events.validated_at')
            ->whereNull('users.banned_at')
            ->paginate(3);

        return response()->json($events);
    }

    public function bookEvent(Request $request)
    {
            $event = Event::findOrFail($request->event_id);
            $validatedReservations = Reservation::where('event_id',$request->event_id)
                                     ->whereNotNull('validated_at')
                                     ->count();

            $available_seats = $event->number_of_seats - $validatedReservations ;

            if($available_seats > 0){
                if($validatedReservations == 0){
                    $seat_number = 1;
                }
                else {
                    $seat_number = Reservation::where('event_id',$request->event_id)
                            ->whereNotNull('validated_at')
                            ->max('seat_number') + 1;
                }
                if($user_id = Session::get('user_id')){
                    $customer = Customer::where('user_id',$user_id)->first();
                }
                else{
                    $customer = Auth::user()->customer;
                }

                if(urldecode($request->validation_type) == 'Open Doors'){
                    $validated_at = now();
                    Reservation::create([
                        'seat_number' => $seat_number,
                        'customer_id' => $customer->id,
                        'event_id' => $event->id,
                        'validated_at' => $validated_at
                    ]);
                    return response()->json(['status' => 'success']);
                }
                else{
                    Reservation::create([
                        'seat_number' => $seat_number,
                        'customer_id' => $customer->id,
                        'event_id' => $event->id,
                    ]);
                    return response()->json(['status' => 'pending']);
                }
            }
              else{
                  return response()->json(['status' => 'error']);
              }
            }


            public function allCategories(){
               $categories = Category::all();
               return response()->json($categories);
            }


            public function filterByName(Request $request){
                if (isset($request->search)){
                    $events = Event::where('date' , '>' ,now())
                        ->where(function($query) use ($request) {
                            $query->where('title', 'LIKE', $request->term . '%')
                                ->orWhere('venue', 'LIKE', '%' . $request->term . '%');
                        })
                        ->whereNotNull('validated_at')
                        ->paginate(3);
                    return response()->json($events);
                }
            }


            public function filterByCategory(Request $request){
                if (isset($request->filter)){
                    $events = Event::where('date' , '>' ,now())
                        ->where('category_id',$request->category)
                        ->whereNotNUll('validated_at')
                        ->paginate(3);
                    if($request->category == ""){
                        return response()->json(['status' => 'default']);
                    }
                    return response()->json($events);
                }
            }


            public function myReservations()
            {
               if($logged_user = Session::get('user_id')){
                   $customer = Customer::where('user_id',$logged_user)->first();
               }
               else{
                   $customer = Auth::user()->customer;
               }

               $reservations = DB::table('reservations')
                                  ->join('events','reservations.event_id','=','events.id')
                                  ->join('categories','events.category_id','=','categories.id')
                                  ->join('organizers','events.organizer_id','=','organizers.id')
                                  ->join('users','organizers.user_id','=','users.id')
                                  ->where('reservations.customer_id',$customer->id)
                                  ->select(
                                       'reservations.*',
                                       'reservations.validated_at as validated',
                                       'reservations.id as reservation_id',
                                       'organizers.*',
                                       'events.*',
                                       'categories.name as category_name',
                                       'users.name as user_name'
                                   )
                                  ->get();


               return view('customer.reservations',['reservations' => $reservations]);
            }

            public function downloadTicket($reservation_id){

                $reservation = DB::table('reservations')
                    ->join('events','reservations.event_id','=','events.id')
                    ->join('categories','events.category_id','=','categories.id')
                    ->join('organizers','events.organizer_id','=','organizers.id')
                    ->join('users','organizers.user_id','=','users.id')
                    ->where('reservations.id',$reservation_id)
                    ->select(
                        'reservations.*',
                        'reservations.validated_at as validated',
                        'reservations.id as reservation_id',
                        'organizers.*',
                        'events.*',
                        'categories.name as category_name',
                        'users.name as user_name'
                    )
                    ->first();

                $data = ['reservation' => $reservation];

                $pdf = Pdf::loadView('ticket.pdf',$data);
                return $pdf->download('ticket-'.$reservation->seat_number.'.pdf');
            }

            public function sendTicketByMail($reservation_id){

                try {
                    $reservation = Reservation::join('events', 'reservations.event_id', '=', 'events.id')
                        ->join('categories', 'events.category_id', '=', 'categories.id')
                        ->join('customers','reservations.customer_id','=' , 'customers.id')
                        ->join('users', 'customers.user_id', '=', 'users.id')
                        ->where('reservations.id', $reservation_id)
                        ->select(
                            'reservations.*',
                            'reservations.validated_at as validated',
                            'reservations.id as reservation_id',
                            'users.email as customer_email',
                            'users.*',
                            'events.*',
                            'categories.name as category_name',
                            'users.name as user_name'
                        )
                        ->first();

                        Mail::to($reservation->customer_email)->send(new Ticket($reservation));
                        return redirect()->back()->with('success', 'Email sent successfully to the email of your account');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
                }
            }







}
