<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseApiController;
use App\Models\Entertainment;
use App\Models\Restaurant;
use App\Http\Resources\NatureResource;
use App\Http\Resources\CultureResource;
use App\Http\Resources\CuisineResource;


class UserDataController extends BaseApiController
{
    public function setCountryAndBirthday(Request $request){

        $user = User::find($request->user()->id);
        $user->country = $request->country;
        $user->birthday = $request->birthday;
        $user->save();  
        return $this->sendResponse([
            'country' => $user->country,
            'birthday' => $user->birthday
        ]);  
    }

    public function editInfo(Request $request){
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string',
            'birthday' => 'required'
            ]);

            $user = User::find($request->user()->id);
            $user->country = $request->country;
            $user->birthday = $request->birthday;
            $user->name = $request->name;
            $user->save();  
            return $this->sendResponse([
                'user' => $user          
            ]); 
    }

    public function editEmail(Request $request){
        $attr = $request->validate([
            'email' => 'required|string|email|unique:users,email',
            ]);

            $user = User::find($request->user()->id);
            $user->email = $request->email;
            $user->save();  
            return $this->sendResponse([
                'user' => $user          
            ]); 
    }

    

    public function returnUserEntertainment( Request $request)
    {
        $user = User::find($request->user()->id);
        return $this->sendResponse([
            'entertainments' => $user->entertainments         
        ]);

    }

    public function returnUserRestaurant( Request $request)
    {
        $user = User::find($request->user()->id);
        return $this->sendResponse([
            'restaurants' => $user->restaurants         
        ]);
    }


    public function addEntertainmentBookmark( Request $request)
    {
        $user = User::find($request->user()->id);
        $entertainment = Entertainment::find($request->id);
        if($entertainment == null){
            $entertainment = new Entertainment();
            $entertainment->id = $request->id;
            $entertainment->name = $request->name;
            $entertainment->city =  $request->city;
            $entertainment->country =  $request->country;
            $entertainment->source = $request->source;
            $entertainment->image = $request->image;
            $entertainment->rating = $request->rating;
            $entertainment->save();
        }

        $user->entertainments()->attach($entertainment);

        return json_encode( [
            'success' => true,
        ]);

    }

    public function addRestaurantBookmark( Request $request)
    {
        $user = User::find($request->user()->id);
        $restaurant = Restaurant::find($request->id);
        if($restaurant == null){
            $restaurant = new Restaurant();
            $restaurant->id = $request->id;
            $restaurant->name = $request->name;
            $restaurant->city = $request->city;
            $restaurant->country = $request->country;
            $restaurant->rating = $request->rating;
            $restaurant->image = $request->image;
            $restaurant->save();

            $user->restaurants()->attach($restaurant);
        }else{
            $user->restaurants()->attach($restaurant);
        }
       

        return json_encode( [
            'success' => true,
        ]);

    }


    public function deleteBookmarkEntertainments(Request $request  , $id){
        $user = User::find($request->user()->id);
        $user->entertainments()->detach($id);

        return json_encode( [
            'success' => true,
        ]);

    }



    public function deleteBookmarkRestaurants(Request $request , $id){
        $user = User::find($request->user()->id);
        $user->restaurants()->detach($id);

        return json_encode( [
            'success' => true,
        ]);

    }

    public function findEntertainmentBookmark(Request $request ){
        $user = User::find($request->user()->id);
        $isExists=$user->entertainments()->where('entertainment_id',$request->id)->exists();

        return json_encode( [
            'success' => $isExists,
        ]);

    }

    public function findRestaurantBookmark(Request $request){
        $user = User::find($request->user()->id);
        $isExists=$user->restaurants()->where('restaurant_id',$request->id)->exists();

        return json_encode( [
            'success' => $isExists,
        ]);

    }

    public function getInterests(Request $request){
        $user = User::find($request->user()->id);
        $natures = $user->natures;
        $cultures = $user->cultures;
        $cuisines = $user->cuisines;

        $response = [
            'success' => true,
            'data'    => [
                NatureResource::collection($natures),
                CultureResource::collection($user->cultures),
                CuisineResource::collection($user->cuisines)
            ]
        ];

        return json_encode($response);
    }
}
