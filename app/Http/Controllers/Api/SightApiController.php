<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sight;
use App\Http\Resources\SightResource;

class SightApiController extends Controller
{
    public function index(){
        $sights = Sight::with(['natures', 'cultures'])->paginate();
        return SightResource::collection($sights);
    }
}
