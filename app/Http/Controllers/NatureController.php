<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nature;

class NatureController extends Controller
{
    //get all natures
    public function index(){
        return view('natures.natures')->with([
            'natures' => Nature::all()
        ]);
    }

    public function store(Request $request){
        $nature = new Nature();
        $nature->name = $request->name;
        $nature->save();
        return redirect()->back();

    }

}
