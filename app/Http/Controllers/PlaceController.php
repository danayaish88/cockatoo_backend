<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    //get all places
    public function index(){
        return view('places.places')->with([
            'places' => Place::all()
        ]);
    }

    public function show($id){
        return view('places.place') -> with([
            'place' => Place::find($id)
        ]);
    }
}
