<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Culture;

class CultureController extends Controller
{
    //get all cultures
    public function index(){
        return view('cultures.cultures')->with([
            'cultures' => Culture::all()
        ]);
    }

    public function store(Request $request){
        $culture = new Culture();
        $culture->name = $request->name;
        $culture->save();
        return redirect()->back()->with('message', 'culture added');
    }
}
