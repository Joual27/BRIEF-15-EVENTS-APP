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




Route::post('/login',[\App\Http\Controllers\AuthController::class,'login'])->name('sign-in');
Route::post('/register/customer',[\App\Http\Controllers\AuthController::class,'customerRegistration'])->name('register.customer');
Route::post('/register/organizer',[\App\Http\Controllers\AuthController::class,'organizerRegistration'])->name('register.organizer');



Route::post('/password/reset/link',[\App\Http\Controllers\PasswordsController::class,'sendResetLink'])
    ->middleware('guest')->name('password.send.reset.link');


Route::get('/password/reset/{token}',[\App\Http\Controllers\PasswordsController::class,'resetPasswordPage'])
    ->middleware('guest')->name('password.reset');

Route::post('/user/password/reset',[\App\Http\Controllers\PasswordsController::class,'resetPassword'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/social/registration/type',[\App\Http\Controllers\SocialMediaAuthController::class,'socialRegistrationType'])->name('social.register.type');

Route::get('/register/google',[\App\Http\Controllers\SocialMediaAuthController::class,'redirectToGoogle'])->name('redirect.google');
Route::get('/auth/google/user/data',[\App\Http\Controllers\SocialMediaAuthController::class,'handleGoogleResponse']);
Route::get('/register/facebook',[\App\Http\Controllers\SocialMediaAuthController::class,'redirectToFacebook'])->name('redirect.facebook');
Route::get('/auth/facebook/user/data',[\App\Http\Controllers\SocialMediaAuthController::class,'handleFacebookResponse']);

Route::post('/register/social/customer',[\App\Http\Controllers\SocialMediaAuthController::class,'socialCustomerRegistration'])->name('register.social.customer');
Route::post('/register/social/organizer',[\App\Http\Controllers\SocialMediaAuthController::class,'socialOrganizerRegistration'])->name('register.social.organizer');


Route::group(['middleware' => 'role:customer'],function (){
    Route::post('/event/book',[\App\Http\Controllers\CustomerController::class,'bookEvent']);
    Route::get('/categories/all',[\App\Http\Controllers\CustomerController::class,'allCategories']);
    Route::post('/event/filter/title',[\App\Http\Controllers\CustomerController::class,'filterByName']);
    Route::post('/event/filter/category',[\App\Http\Controllers\CustomerController::class,'filterByCategory']);
    Route::get('/customer/reservations',[\App\Http\Controllers\CustomerController::class,'myReservations'])->name('customer.reservations');
    Route::get('/ticket/download/{reservation_id}',[\App\Http\Controllers\CustomerController::class,'downloadTicket'])->name('pdf.download');
    Route::get('/ticket/mail/{reservation_id}',[\App\Http\Controllers\CustomerController::class,'sendTicketByMail'])->name('ticket.mail');
    Route::get('/events',[\App\Http\Controllers\CustomerController::class,'events'])->name('events.all');
    Route::get('/events/all',[\App\Http\Controllers\CustomerController::class,'allEvents']);
});

Route::group(['middleware' => 'role:organizer'],function (){
    Route::get('/dashboard',[\App\Http\Controllers\OrganizerController::class,'dashboard'])->name('dashboard');
    Route::post('/events/create',[\App\Http\Controllers\OrganizerController::class,'createEvent'])->name('event.add');
    Route::get('/event/edit/{event}',[\App\Http\Controllers\OrganizerController::class,'editEvent'])->name('event.edit');
    Route::post('/event/edit/{event}',[\App\Http\Controllers\OrganizerController::class,'updateEvent'])->name('event.update');
    Route::delete('/event/delete/{event}',[\App\Http\Controllers\OrganizerController::class,'deleteEvent'])->name('event.delete');
    Route::get('/requests/pending',[\App\Http\Controllers\OrganizerController::class,'fetchRequests']);
    Route::get('/requests/count',[\App\Http\Controllers\OrganizerController::class,'requestsCount']);
    Route::post('/request/validate',[\App\Http\Controllers\OrganizerController::class,'validateRequest']);
    Route::post('/request/refuse',[\App\Http\Controllers\OrganizerController::class,'refuseRequest']);
});

Route::group(['middleware' => 'role:admin'],function (){
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/admin/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
    Route::post('/categories/add',[\App\Http\Controllers\AdminController::class,'createCategory'])->name('categories.add');
    Route::get('/categories/edit/{category}',[\App\Http\Controllers\AdminController::class,'editCategory'])->name('categories.edit');
    Route::post('/categories/edit/{category}',[\App\Http\Controllers\AdminController::class,'updateCategory'])->name('categories.update');
    Route::delete('/categories/delete/{category}',[\App\Http\Controllers\AdminController::class,'deleteCategory'])->name('categories.delete');
    Route::get('/users/ban/{user}',[\App\Http\Controllers\AdminController::class,'banUser'])->name('users.ban');
    Route::get('events/approve/{event}',[\App\Http\Controllers\AdminController::class,'approveEvent'])->name('event.validate');
    Route::get('events/decline/{event}',[\App\Http\Controllers\AdminController::class,'rejectEvent'])->name('event.reject');
});

Route::get('logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');




