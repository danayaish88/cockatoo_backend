<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Http\Resources\CuisineResource;

class CuisineApiController extends Controller
{
    public function index(){
        $cuisines = Cuisine::all();
        return CuisineResource::collection($cuisines);
    }
}
