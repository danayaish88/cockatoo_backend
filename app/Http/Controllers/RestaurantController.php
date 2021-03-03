<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    //get all restaurants
    public function index(){
        return view('restaurants.restaurants')->with([
            'restaurants' => Restaurant::all()
        ]);
    }

    public function show($id){
        return view('restaurants.restaurant') -> with([
            'restaurant' => Restaurant::find($id)
        ]);
    }
}
