<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaAuthController extends Controller
{

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleResponse()
    {
       $social_user = Socialite::driver('google')->user();
       $existing_user = User::where('social_id',$social_user->id)->first();
       if($existing_user){
           if($existing_user->is_customer()){
               Session::put('role','customer');
               return redirect()->route('events.all');

           }
           else if($existing_user->is_organizer()){
               Session::put('role','organizer');
               return redirect()->route('dashboard');

           }
       }
       else{
           Session::put('social_user',$social_user);
           return redirect()->route('social.register.type');
       }
    }

    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookResponse()
    {
        $social_user = Socialite::driver('facebook')->user();
        $existing_user = User::where('social_id',$social_user->id)->first();
        if($existing_user){
            if($existing_user->is_customer()){
                Session::put('role','customer');
                return redirect()->route('events.all');
            }
            else if($existing_user->is_organizer()){
                Session::put('role','organizer');
                return redirect()->route('dashboard');
            }
        }
        else{
            Session::put('social_user',$social_user);
            return redirect()->route('social.register.type');
        }
    }



    public function socialRegistrationType(){
        return view('auth.registration-type');
    }


    public function socialCustomerRegistration(Request $request){
        $data['email'] = $request->input('email');
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['social_id'] = $request->input('social_id');
        $data['password'] = Hash::make($data['email']);
        $user = User::create($data);
        Customer::create(['user_id' => $user->id]);
        Session::put('role','customer');
        return redirect()->route('events.all');
    }
    public function socialOrganizerRegistration(Request $request){
        $data['email'] = $request->input('email');
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['social_id'] = $request->input('social_id');
        $data['password'] = Hash::make($data['email']);
        $user = User::create($data);
        Organizer::create(['user_id' => $user->id]);
        Session::put('role','organizer');
        return redirect()->route('dashboard');
    }

}
