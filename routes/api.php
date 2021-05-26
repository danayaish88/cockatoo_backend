<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NatureApiController;
use App\Http\Controllers\Api\CuisineApiController;
use App\Http\Controllers\Api\CultureApiController;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\SightApiController;
use App\Http\Controllers\Api\EntertainmentApiController;
use App\Http\Controllers\Api\PlaceApiController;
use App\Http\Controllers\Api\UserDataController;
use App\Http\Controllers\Auth\CuisineController;

use App\models\Restaurant;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\StoryApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('natures', [NatureApiController::class, 'index']);

Route::get('cuisines', [CuisineApiController::class, 'index']);

Route::get('cultures', [CultureApiController::class, 'index']);

Route::get('restaurants', [RestaurantApiController::class, 'index']);

Route::get('sights', [SightApiController::class, 'index']);

Route::get('entertainments', [EntertainmentApiController::class, 'index']);
Route::get('entertainments/{id}', [EntertainmentApiController::class, 'show']);

Route::get('hotels', [PlaceApiController::class, 'indexHotels']);

Route::get('find-all-restaurants-bookmark/', [RestaurantApiController::class, 'index']);
Route::get('find-all-restaurants-user-bookmark/', [RestaurantApiController::class, 'getPivot']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function(Request $request) {
        return auth()->user();
    });

    Route::put('/user', [UserDataController::class, 'setCountryAndBirthday']);

    Route::put('/user/data', [UserDataController::class, 'setCountryAndBirthday']);
    Route::put('/user/edit', [UserDataController::class, 'editInfo']);
    Route::put('/user/editEmail', [UserDataController::class, 'editEmail']);
    Route::post('/user/change-password', [ChangePasswordController::class, 'store']);
    Route::post('user/cuisines', [CuisineApiController::class, 'store']);
    Route::post('user/natures', [NatureApiController::class, 'store']);
    Route::post('user/cultures', [CultureApiController::class, 'store']);
    Route::get('user/get/interests', [UserDataController::class, 'getInterests']);
    Route::get('user/get/cuisines', [CuisineApiController::class, 'getCuisinesForUser']);
    Route::get('/user/stories', [StoryApiController::class, 'index']);
    Route::post('user/save-story', [StoryApiController::class, 'store']);
    Route::delete('user/delete-story/{id}', [StoryApiController::class, 'destroy']);
    Route::get('user/entertainments/', [UserDataController::class, 'returnUserEntertainment']);
    Route::get('user/restaurants/', [UserDataController::class, 'returnUserRestaurant']);
    Route::post('user/add-restaurant-bookmark', [UserDataController::class, 'addRestaurantBookmark']);
    Route::post('user/add-entertainment-bookmark', [UserDataController::class, 'addEntertainmentBookmark']);
    Route::delete('user/delete-entertainment-bookmark/{id}', [UserDataController::class, 'deleteBookmarkEntertainments']);
    Route::delete('user/delete-restaurant-bookmark/{id}', [UserDataController::class, 'deleteBookmarkRestaurants']);
    Route::get('user/find-entertainment-bookmark/', [UserDataController::class, 'findEntertainmentBookmark']);
    Route::delete('user/delete-entertainment-bookmark/{id}', [UserDataController::Class, 'deleteBookmarkEntertainments']);
    Route::delete('user/delete-restaurant-bookmark/{id}', [UserDataController::Class, 'deleteBookmarkRestaurants']);
    Route::get('user/find-restaurant-bookmark/', [UserDataController::class, 'findRestaurantBookmark']);


    Route::post('/auth/logout', [AuthController::class, 'logout']);
});


Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/auth/register', [AuthController::class, 'register']);

// needs email only, sends a code by email
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);

// needs code & email, returns a token if code is valid to use it in resetting password
Route::post('/forgot-password/code', [ForgotPasswordController::class, 'validatePasswordResetToken']);

//need password token, new password ,new password confirmation and email
Route::post('/reset-password', [ResetPasswordController::class, 'setNewAccountPassword']);





