<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Culture;
use App\Http\Resources\CultureResource;
use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;


class CultureApiController extends BaseApiController
{
    public function index(){
        $cultures = Culture::all();
        return CultureResource::collection($cultures);
    }

    public function store(Request $request){
        $user = User::find($request->user()->id);
        $user->cultures()->attach($request->cultures);
        return $this->sendResponse([
            CultureResource::collection($user->cultures)
        ]); 
    }
}
