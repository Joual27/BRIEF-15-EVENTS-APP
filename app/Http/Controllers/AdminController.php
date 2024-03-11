<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard ()
    {
        $overall_customers = Customer::count();
        $overall_organizors = Organizer::count();
        $overall_reservations = Reservation::count();
        $overall_events = Event::count();
        $events = Event::whereNull('validated_at')
             ->whereNull('rejected_at')
             ->with('organizer.user')
             ->get();

        return view('admin.dashboard' , [
            'overall_customers' => $overall_customers,
            'overall_organizors' => $overall_organizors,
            'overall_reservations' => $overall_reservations,
            'overall_events' => $overall_events,
            'events' => $events
        ]);
    }

    public function users ()
    {
        $users = User::whereNull('banned_at')
            ->whereDoesntHave('admin')
            ->with(['customer', 'organizer'])
            ->get();
        return view('admin.users', compact('users'));
    }

    public function categories ()
    {
        $categories = Category::all();
        return view('admin.categories' , compact('categories'));
    }

    public function createCategory(Request $request)
    {
        Category::create([
            'name' => $request->category
        ]);
        return redirect()->back()->with('success','Category Created Successfully !');

    }


    public function editCategory(Category $category){
        $category = Category::findOrFail($category->id);

        return view('admin.edit-category',['category' => $category]);
    }


    public function updateCategory(Category $category,Request $request)
    {
        $category->name = $request->category;
        $category->save();
        return redirect()->route('categories')->with('success','Category Updated Successfully !');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }


    public function banUser(User $user){
        $user->banned_at = now();
        $user->save();
        return redirect()->back()->with('success','user_banned_successfully !');
    }


    public function approveEvent(Event $event){
        $event->validated_at = now();
        $event->save();
        return redirect()->back();
    }
    public function rejectEvent(Event $event){
        $event->rejected_at = now();
        $event->save();
        return redirect()->back();
    }


}
