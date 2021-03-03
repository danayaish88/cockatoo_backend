<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    //get all routes
    public function index(){
        return view('routes.routes')->with([
            'routes' => Route::all()
        ]);
    }

    public function show($id){
        return view('routes.route') -> with([
            'route' => Route::find($id)
        ]);
    }
}
