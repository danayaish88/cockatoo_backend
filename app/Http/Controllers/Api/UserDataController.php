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

}
