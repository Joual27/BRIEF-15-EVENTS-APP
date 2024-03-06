<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        return view('organizer.dashboard',['categories' => $categories]);
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

        if ($user_id = Session::get('user_id')){
            $organizer = User::where('id',$user_id)->first();
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
            'image' => $request->file('image'),
            'organizer_id' => $organizer->id
        ];

        Event::create($event_data);
        return redirect()->back()->with('success',"request done , wait for admin's approval");
    }
}
