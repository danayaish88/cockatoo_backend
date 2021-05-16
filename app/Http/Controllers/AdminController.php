<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Story;
use App\Models\Image;
use App\Http\Resources\UserResource;

class AdminController extends Controller
{
    public function getCountOfUsers(){
        $users = User::all();
        return $users->count();
    }

    public function getCountOfStories(){
        $stories = Story::all();
        return $stories->count();
    }

    public function getCountOfImages(){
        $images = Image::all();
        return $images->count();
    }

    public function lastFiveUsers(){
        $users = User::orderBy('id', 'desc')->take(5)->get();
        return UserResource::collection($users);
    }

    )
}
