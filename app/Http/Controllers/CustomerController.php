<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(isset($request->book)){

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
            else{
                return response()->json(['status' => 'failed']);
            }
        }

}
