<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Culture;
use App\Http\Resources\CultureResource;

class CultureApiController extends Controller
{
    public function index(){
        $cultures = Culture::all();
        return CultureResource::collection($cultures);
    }
}
