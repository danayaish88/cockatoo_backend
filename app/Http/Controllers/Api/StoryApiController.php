<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StoryResource;
use App\Models\Story;
use App\Models\User;
use App\Models\Image;
use App\Http\Controllers\Api\BaseApiController;

class StoryApiController extends Controller
{
    public function index(Request $request){
        $stories = Story::where('user_id', $request->user()->id)->get();
        return StoryResource::collection($stories);
    }

    public function store(Request $request){
        $user = User::find($request->user()->id);

        $story = new Story;
        $story->name = $request->input('name');
        $story->city =  $request->input('city');
        $story->country =  $request->input('country');
        $story->points = $request->input('points');
        $user->stories()->save($story);

        foreach($request->input('images') as $image)
        {
           $imageRecord = new Image;
           $imageRecord->description = $image['description'];
           $imageRecord->url = $image['url'];
           $imageRecord->lat = $image['lat'];
           $imageRecord->lan = $image['lan'];
          $story->images()->save($imageRecord);
          
        }

        return json_encode( [
            'success' => true,
        ]);
    }
}
