<?php

use Illuminate\Support\Facades\Route;
use App\Models\Nature;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantsResource;
use App\Http\Controllers\SightController;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CultureController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth'])->group( function(){
    Route::get('sights', [SightController::class, 'index']);
    Route::post('sights', [SightController::class, 'store'])->name('save-sight');
    Route::get('sights/{id}', [SightController::class, 'show']);
    
    Route::get('routes', [RouteController::class, 'index']);
    Route::get('routes/{id}', [RouteController::class, 'show']);
    
    Route::get('restaurants', [RestaurantController::class, 'index']);
    Route::get('restaurants/{id}', [RestaurantController::class, 'show']);
    
    Route::get('places', [PlaceController::class, 'index']);
    Route::get('places/{id}', [PlaceController::class, 'show']);
    
    Route::get('images', [ImageController::class, 'index']);
    Route::get('images/{id}', [ImageController::class, 'show']);
    
    Route::get('entertainments', [EntertainmentController::class, 'index']);
    Route::get('entertainments/{id}', [EntertainmentController::class, 'show']);
    
    Route::get('cultures', [CultureController::class, 'index'])->name('cultures');
    Route::post('cultures', [CultureController::class, 'store'])->name('save_culture');
    
    Route::get('cuisines', [CuisineController::class, 'index'])->name('cuisines');
    Route::post('cuisines', [CuisineController::class, 'store'])->name('save_cuisine');
    
    Route::get('natures', [NatureController::class, 'index'])->name('natures');
    Route::post('natures', [NatureController::class, 'store'])->name('save_nature');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
this route will return a view instructing the user to click the email 
verification link that was emailed to them by Laravel after registration
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


/*
this route will handle requests generated when the user clicks the
 email verification link that was emailed to them
*/
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    /*This method will call the markEmailAsVerified method on the 
    authenticated user and dispatch the Illuminate\Auth\Events\Verified event.*/
    $request->fulfill();             

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

/*
 a route to allow the user to request that the verification email be resent.
*/
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
