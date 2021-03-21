<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Resources\PlaceResource;

class PlaceApiController extends Controller
{
    //get all hotels
    public function indexHotels(){
        $hotels = Place::where('category', 'hotel')->paginate();
        return PlaceResource::collection($hotels);
    }
}
