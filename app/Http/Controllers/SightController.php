<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sight;

class SightController extends Controller
{
    //get all sights
    public function index(){
        return view('sights.sights')->with([
            'sights' => Sight::all()
        ]);
    }

    public function show($id){
        return view('sights.sight') -> with([
            'sight' => Sight::find($id)
        ]);
    }

    public function store( Request $request){
        $request -> validate([
            'sight_name' => 'required',
            'sight_country' => 'required'
        ]);
        // TODO
        //dd($request);
        $sight = new Sight;
        $sight->name = $request->input('sight_name');
        $sight->city = $request->input('sight_city');
        $sight->country = $request->input('sight_country');
        $sight->location = json_encode(['latitude' => 20, "longitude" => 30]);
        //dd($sight);
        $sight->save;
        return redirect()->back()->with('message', 'Sight added');
    }
}
