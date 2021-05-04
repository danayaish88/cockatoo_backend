<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseApiController;
use App\Models\Entertainment;
use App\Models\Restaurant;


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
            $entertainment = new Entertainment;
            $entertainment->id = $request->input('id');
            $entertainment->name = $request->input('name');
            $entertainment->city =  $request->input('city');
            $entertainment->country =  $request->input('country');
            $entertainment->source = $request->input('source');
            $entertainment->image = $request->input('image');
            $entertainment->rating = $request->input('rating');
            $entertainment->save();
            $user->entertainments()->attach($entertainment);
        }else{
            $user->entertainments()->attach($entertainment);
        }

    
        return json_encode( [
            'success' => true,
        ]);

    }

    public function addRestaurantBookmark( Request $request)
    {
        $user = User::find($request->user()->id);
        $restaurant = Restaurant::find($request->id);
        if($restaurant == null){
            $restaurant = new Restaurant;
            $restaurant->id = $request->input('id');
            $restaurant->name = $request->input('name');
            $restaurant->city =  $request->input('city');
            $restaurant->country =  $request->input('country');
            $restaurant->image = $request->input('image');
            $restaurant->rating = $request->input('rating');
            $restaurant->save();
            $user->restaurants()->attach($restaurant);
        }else{
            $user->restaurants()->attach($restaurant);
        }
       

        return json_encode( [
            'success' => true,
        ]);

    }


    public function deleteBookmarkEntertainments(Request $request , $id){
        $user = User::find($request->user()->id);
        $user->entertainments()->where('entertainment_id',$id)->delete();

        return json_encode( [
            'success' => true,
        ]);

    }



    public function deleteBookmarkRestaurants(Request $request , $id){
        $user = User::find($request->user()->id);
        $user->restaurants()->where('restaurant_id',$id)->delete();

        return json_encode( [
            'success' => true,
        ]);

    }

}
