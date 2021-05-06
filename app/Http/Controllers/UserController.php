<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request): string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

       //$request->session()->put('user', $user);
        return redirect('/stories-view')->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }

    public function logout(){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('/');
    }
}
