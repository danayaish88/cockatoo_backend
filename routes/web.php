<?php

use Illuminate\Support\Facades\Route;
use App\Models\Nature;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantsResource;
use App\Http\Controllers\SightController;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\UserController;

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


Route::view('/', 'welcome');
Route::view('/user/login-view', 'user_views.login');

Route::post('/user/login', [UserController::class, 'login']);

Route::get('/user/logout',[UserController::class, 'logout']);



Auth::routes();

Route::get('/user/stories', function () {
    return view('user_views.stories');
})->middleware(['auth'])->name('stories');


/*Route::middleware(['auth'])->group( function(){

    Route::view('/user/stories', 'user_views.stories');

    
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
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
