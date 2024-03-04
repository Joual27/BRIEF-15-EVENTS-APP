<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register',[\App\Http\Controllers\AuthController::class,'registrationPage'])->name('register');
Route::get('/login',[\App\Http\Controllers\AuthController::class,'loginPage'])->name('login');

Route::get('/events',[\App\Http\Controllers\CustomerController::class,'events'])->name('events.all');
Route::get('/dashboard',[\App\Http\Controllers\OrganizerController::class,'dashboard'])->name('dashboard');


Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('sign-in');
Route::post('/register/customer',[\App\Http\Controllers\AuthController::class,'customerRegistration'])->name('register.customer');
Route::post('/register/organizer',[\App\Http\Controllers\AuthController::class,'organizerRegistration'])->name('register.organizer');

Route::get('/forgot-password',[\App\Http\Controllers\PasswordsController::class,'forgetPasswordInterface'])
    ->middleware('guest')
    ->name('forgot.password.interface');

Route::post('/password/reset/link',[\App\Http\Controllers\PasswordsController::class,'sendResetLink'])
    ->middleware('guest')->name('password.send.reset.link');


Route::get('/password/reset/{token}',[\App\Http\Controllers\PasswordsController::class,'resetPasswordPage'])
    ->middleware('guest')->name('password.reset');

Route::post('user/password/reset',[\App\Http\Controllers\PasswordsController::class,'resetPassword'])
    ->middleware('guest')
    ->name('password.update');
