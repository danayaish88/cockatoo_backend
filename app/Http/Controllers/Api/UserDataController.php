<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseApiController;


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

        $userEntertainment = new Story;
        $story->name = $request->input('name');
        $story->city =  $request->input('city');
        $story->country =  $request->input('country');
        $story->points = $request->input('points');
        $story->dateCreated = $request->input('dateCreated');
        $user->stories()->save($story);

        $user->entertainments()->sync($request->entertainment);

        return json_encode( [
            'success' => true,
        ]);

    }

    public function addRestaurantBookmark( Request $request)
    {
        $user = User::find($request->user()->id);
        $user->restaurants()->sync($request->restaurant);

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
