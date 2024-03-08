<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrganizerController extends Controller
{
    public function dashboard()
    {

        if(Session::get('user_id')){
            $organizer = User::where('id',Session::get('user_id'))->first();
        }
        else{
            $organizer = Auth::user()->organizer;
        }
        $validated_events = Event::whereNotNull('validated_at')->count();
        $pending_events = Event::whereNUll('validated_at')->count();
        $events = Event::where('organizer_id',$organizer->id)->paginate(3);
        $categories = Category::all();
        return view('organizer.dashboard',[
            'categories' => $categories,
            'events' => $events ,
            'validated_events' => $validated_events,
            'pending_events' => $pending_events
        ]);
    }

    public function createEvent(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required' ,
            'date' => 'required' ,
            'venue' => 'required' ,
            'number_of_seats' => 'required|numeric',
            'price_per_seat' =>  'required|numeric',
            'validation_type' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        if(Session::get('user_id')){
            $organizer = User::where('id',Session::get('user_id'))->first();
        }
        else{
            $organizer = Auth::user()->organizer;
        }

        $img = $request->file('image');
        $image_name = date('YmdHis').'.'.$img->getClientOriginalExtension();
        $img->storeAs('public/uploads',$image_name);

        $event_data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'venue' => $request->input('venue'),
            'number_of_seats' => $request->input('number_of_seats'),
            'price_per_seat' => $request->input('price_per_seat'),
            'validation_type' => $request->input('validation_type'),
            'category_id' => $request->input('category_id'),
            'image' => $image_name,
            'organizer_id' => $organizer->id
        ];

        Event::create($event_data);
        return redirect()->back()->with('success',"request done , wait for admin's approval");
    }


    public function editEvent(Event $event)
    {
        $categories = Category::all();
        return view('organizer.edit-event',['categories' => $categories ,'event' => $event]);
    }


    public function updateEvent(Request $request,Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required' ,
            'date' => 'required' ,
            'venue' => 'required' ,
            'number_of_seats' => 'required|numeric',
            'price_per_seat' =>  'required|numeric',
            'validation_type' => 'required',
            'category_id' => 'required',
            'image' => 'image'
        ]);

        $image_name = $event->image;
        if($request->file('image')){
            $img = $request->file('image');
            $image_name = date('YmdHis').'.'.$img->getClientOriginalExtension();
            $img->storeAs('public/uploads',$image_name);
        }
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->date = $request->input('date');
        $event->venue = $request->input('venue');
        $event->number_of_seats = $request->input('number_of_seats');
        $event->price_per_seat = $request->input('price_per_seat');
        $event->validation_type = $request->input('validation_type');
        $event->category_id = $request->input('category_id');
        $event->image = $image_name;
        $event->save();
        return redirect()->route('dashboard')->with('success','Event ' . $event->title . " Updated successfully");
    }
    public function deleteEvent(Event $event)
    {
        $event->delete();
        return redirect()->route('dashboard')->with('deleted','Event ' . $event->title . ' deleted successfully !');
    }

    public function fetchRequests()
    {
        if($id = Session::get('user_id')){
            $organizer = Organizer::where('id',$id)->first();
        }
        else{
            $organizer = Auth::user()->organizer;
        }
        $events_of_organizer_ids = Event::where('organizer_id',$organizer->id)->pluck('id')->toArray();

        $requests = Reservation::whereIn('event_id',$events_of_organizer_ids)
            ->whereNull('validated_at')
            ->whereNull('refused_at')
            ->with('customer.user','event')
            ->orderBy('created_at','desc')
            ->get();

        return response()->json($requests);

    }

    public function requestsCount(){
        if($id = Session::get('user_id')){
            $organizer = Organizer::where('id',$id)->first();
        }
        else{
            $organizer = Auth::user()->organizer;
        }
        $events_of_organizer_ids = Event::where('organizer_id',$organizer->id)->pluck('id')->toArray();
        $pending_requests_count = $requests = Reservation::whereIn('event_id',$events_of_organizer_ids)
            ->whereNull('validated_at')
            ->whereNull('refused_at')
            ->count();
        return response()->json(['count' => $pending_requests_count]);
    }


    public function validateRequest(Request $request){

        if(isset($request->validate)){
            $id = $request->id;
            $reservation = Reservation::findOrFail($id);

            $max_seat_number = Reservation::where('event_id',$reservation->event_id)
                ->max('seat_number');

            $reservation->validated_at = now();
            $reservation->seat_number = $max_seat_number + 1;
            $reservation->save();
        }
    }


    public function refuseRequest(Request $request){

        if(isset($request->refuse)){
            $id = $request->id;
            $reservation = Reservation::findOrFail($id);
            $reservation->refused_at = now();
            $reservation->save();
        }
    }





}
