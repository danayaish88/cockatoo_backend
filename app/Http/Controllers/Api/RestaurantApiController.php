<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource;

class RestaurantApiController extends Controller
{
    public function index(){
        $restaurants = Restaurant::all();
        return RestaurantResource::collection($restaurants);
    }

    public function show($id){
        return Restaurant::find($id);
    }

}
