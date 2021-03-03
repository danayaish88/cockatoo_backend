<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NatureApiController;
use App\Http\Controllers\Api\CuisineApiController;
use App\Http\Controllers\Api\CultureApiController;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\SightApiController;
use App\Http\Controllers\Api\EntertainmentApiController;


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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
