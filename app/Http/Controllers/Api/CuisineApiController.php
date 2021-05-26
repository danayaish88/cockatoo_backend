<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Http\Resources\CuisineResource;
use App\Http\Controllers\Api\BaseApiController;


class CuisineApiController extends BaseApiController
{
    public function index(){
        $cuisines = Cuisine::all();
        return CuisineResource::collection($cuisines);
    }

    public function store(Request $request){
        $user = User::find($request->user()->id);
        $user->cuisines()->sync($request->cuisines);
        return $this->sendResponse(
            CuisineResource::collection($user->cuisines)
        ); 
    }
    public function getCuisinesForUser(Request $request){
        $user = User::find($request->user()->id);
        return $this->sendResponse(
            CuisineResource::collection($user->cuisines)
        ); 
    }

}
