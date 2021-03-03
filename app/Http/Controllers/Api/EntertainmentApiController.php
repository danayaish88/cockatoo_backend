<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\EntertainmentResource;

class EntertainmentApiController extends Controller
{
    public function index(){
        $entertainments = Entertainment::paginate();
        return EntertainmentResource::collection($entertainments);
    }
}
