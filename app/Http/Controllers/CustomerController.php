<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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

}
