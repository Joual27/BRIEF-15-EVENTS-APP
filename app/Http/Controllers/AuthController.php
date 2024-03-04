<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{


    public function registrationPage()
    {
        return view('auth.register');
    }

    public function loginPage(){
        return view('auth.login');
    }

    public function customerRegistration(Request $request){

           $request->validate([
               'name' => 'required|regex:/^[a-zA-Z ]+$/',
               'email' => [
                   'required',
                   'email',
                   Rule::unique('users', 'email')
               ],
               'password' => 'required|min:8',
               'confirm_password' => 'required|same:password'
           ]);
           $data = $request->only('name','email','password');
           $user = User::create($data);



           Customer::create(['user_id' => $user->id]);
           return redirect()->route('login')->with('success','Account Created ! Please sign in .');


    }

    public function organizerRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'organization' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        $data = $request->only('name','email','password');
        $user = User::create($data);
        Organizer::create(['user_id' => $user->id , 'organization' => $request->organization]);
        return redirect()->route('login')->with('success','Account Created ! Please sign in .');


    }

    public function login(Request $request)
    {
         $request->validate([
            'email'=>'required|email',
            'password' => 'required'
         ]);

         if(Auth::attempt(['email' => $request->input('email') , 'password' => $request->input('password')])){

             $logging_user = Auth::user();

             if($logging_user->is_customer()){
                Session::put('role','customer');
                return redirect()->route('events.all');
             }
             else if($logging_user->is_organizer()){
                 Session::put('role','organizer');
                 return redirect()->route('dashboard');
             }

         }
         else{
             return redirect()->back()->withErrors('Invalid Credentials , try again !');
         }
    }



}
