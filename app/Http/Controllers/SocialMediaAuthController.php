<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
           }
           else if($existing_user->is_organizer()){
               Session::put('role','organizer');
           }
       }
       else{
           Session::put('social_user',$social_user);
           return redirect()->route('');
       }
    }

}
