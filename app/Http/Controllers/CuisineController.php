<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;

class CuisineController extends Controller
{
    //get all cuisines
    public function index(){
        return view('cuisines.cuisines')->with([
            'cuisines' => Cuisine::all()
        ]);
    }

    public function store(Request $request){
        $cuisine = new Cuisine();
        $cuisine->name = $request->name;
        $cuisine->save();
        return redirect()->back()->with('message', 'cuisine added');
    }


}
