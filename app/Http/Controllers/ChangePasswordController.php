<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Api\BaseApiController;


class ChangePasswordController extends BaseApiController
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => 'required|confirmed'
        ]);

        $user =  User::find($request->user()->id);
        $user->update(['password'=> Hash::make($request->new_password)]);
   
        return $this->sendResponse([
            'user' => $user          
        ]);
    }
}
