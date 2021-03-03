<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource;

class RestaurantApiController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('cuisines')->paginate();
        return RestaurantResource::collection($restaurants);
    }
}
