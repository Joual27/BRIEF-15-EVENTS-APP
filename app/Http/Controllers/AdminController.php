<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard ()
    {
        return view('admin.dashboard');
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


}
