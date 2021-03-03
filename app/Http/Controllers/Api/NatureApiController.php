<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nature;
use App\Http\Resources\NatureResource;

class NatureApiController extends Controller
{
    public function index(){
        $natures = Nature::all();
        return NatureResource::collection($natures);
    }
}
