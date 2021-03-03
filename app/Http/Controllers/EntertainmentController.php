<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainment;

class EntertainmentController extends Controller
{
    //get all entertainments
    public function index(){
        return view('entertainments.entertainments')->with([
            'entertainments' => Entertainment::all()
        ]);
    }

    public function show($id){
        return view('entertainments.entertainment') -> with([
            'entertainment' => Entertainment::find($id)
        ]);
    }
}
