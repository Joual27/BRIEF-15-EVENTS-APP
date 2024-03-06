<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PasswordsController extends Controller
{

    public function forgetPasswordInterface(){
        return view('auth.forgot-password');
    }


    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Session::put('email',$request->input('email'));

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'An email has been sent to you !'])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordPage($token)
    {
        return view('auth.passwords.reset-password',['token' => $token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function (User $user , string $password){
                $user->forceFill([
                    'password' => $password
                ]);
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success','Password Updated !')
            : back()->withErrors(['email' => [__($status)]]);
    }

}
