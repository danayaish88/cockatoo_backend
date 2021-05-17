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
use App\Http\Controllers\StoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



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


//Route::view('/', 'welcome');
Route::view('/', 'user_views.login')->name('userLogin');

Route::post('/user/login', [LoginController::class, 'login'])->name('login-user');

Route::get('/get-story/{id}', [StoryController::class, 'getStory']);
Route::get('/get-story-id/{id}', [StoryController::class, 'getStoryId']);

Route::view('shared-story', 'user_views.shared_story')->name('shared-story-view');


//Auth::routes();


Route::middleware(['auth'])->group( function(){

    Route::get('/all-stories', [StoryController::class, 'index']);
    Route::get('/get/name', [UserController::class, 'getName']);
    Route::post('/share-story/{id}', [StoryController::class, 'shareStory']);

    Route::get('/stories-view', function () {
        return view('user_views.stories');
    })->name('userHome');

    Route::post('/logout-user', [UserController::class, 'logout'])->name('logout-user');

});
Route::get('get-popular-places', [AdminController::class, 'getPopularPlaces']);


Route::middleware(['is_admin'])->group( function(){
    Route::get('dashborad', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('users-count', [AdminController::class, 'getCountOfUsers']);
    Route::get('stories-count', [AdminController::class, 'getCountOfStories']);
    Route::get('images-count', [AdminController::class, 'getCountOfImages']);
    Route::get('bookmarks-count', [AdminController::class, 'getCountOfBookmarks']);
    Route::get('last-five-users', [AdminController::class, 'lastFiveUsers']);
    Route::get('get-countries', [AdminController::class, 'getCountriesPercentage']);
    Route::post('/logout-user', [UserController::class, 'logout'])->name('logout-user');

});




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
