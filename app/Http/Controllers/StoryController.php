<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StoryResource;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function index(Request $request){
        $stories = Story::where('user_id', Auth::id())->get();
        return StoryResource::collection($stories);
    }
}
