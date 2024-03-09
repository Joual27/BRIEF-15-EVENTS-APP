<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{

    public function events()
    {
        return view('customer.events');
    }
    public function allEvents(){
        $events = Event::where('date' , '>' ,now())
            ->whereNotNUll('validated_at')
            ->paginate(3);;
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
            }


            public function allCategories(){
               $categories = Category::all();
               return response()->json($categories);
            }


            public function filterByName(Request $request){
                if (isset($request->search)){
                    $events = Event::where('date' , '>' ,now())
                        ->where('title','LIKE', $request->term . '%')
                        ->whereNotNUll('validated_at')
                        ->paginate(3);
                    return response()->json($events);
                }
            }
            public function filterByVenue(Request $request){
                if (isset($request->search)){
                    $events = Event::where('date' , '>' ,now())
                        ->where('venue','LIKE', $request->term . '%')
                        ->whereNotNUll('validated_at')
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
            public function filterByDate(Request $request){
                if (isset($request->filter)){
                    $event_date = date('Y-m-d',strtotime($request->date));
                    $eventsQuery = Event::where('date', '>', now())
                        ->whereDate('date', $event_date)
                        ->whereNotNull('validated_at');

                    // Log the generated SQL query
                    \Log::info($eventsQuery->toSql());

                    $events = $eventsQuery->paginate(3);
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
                                       'organizers.*',
                                       'events.*',
                                       'categories.name as category_name',
                                       'users.name as user_name'
                                   )
                                  ->paginate(6);
               return view('customer.reservations',['reservations' => $reservations]);
            }



}
