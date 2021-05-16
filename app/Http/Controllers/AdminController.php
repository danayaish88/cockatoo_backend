<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Story;
use App\Models\Image;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;



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

    public function getCountOfBookmarks(){
        $pivot1 = DB::table('restaurant_user')->get();
        $pivot2 = DB::table('entertainment_user')->get();

        return $pivot1->count() + $pivot2->count();
    }

    public function getCountriesPercentage(){
        $countries = User::select('country')
                            ->selectRaw('COUNT(*) AS count')
                            ->groupBy('country')
                            ->orderByDesc('count')
                            ->take(5)
                            ->get();
        return $countries;
    }

    public function getPopularPlaces(){
        $list = [];
        $rests = DB::table('entertainment_user')
                        ->select('entertainment_id')
                        ->groupBy('entertainment_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(3)
                        ->get();

        foreach($rests as $rest){

        }
        return $rest;
    }
}
