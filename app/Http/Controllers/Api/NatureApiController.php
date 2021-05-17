<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nature;
use App\Http\Resources\NatureResource;
use App\Http\Controllers\Api\BaseApiController;
use App\Models\User;


class NatureApiController extends BaseApiController
{
    public function index(){
        $natures = Nature::all();
        return NatureResource::collection($natures);
    }

    public function store(Request $request){
        $user = User::find($request->user()->id);
        $user->natures()->sync($request->natures);
        return $this->sendResponse(
            NatureResource::collection($user->natures)
        ); 
    }

    public function getNaturesForUser(Request $request){
        $user = User::find($request->user()->id);
        return $this->sendResponse(
            NatureResource::collection($user->natures)
        ); 
    }
}
