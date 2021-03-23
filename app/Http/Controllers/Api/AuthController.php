<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\BaseApiController;

class AuthController extends BaseApiController
{
    public function login(Request $request): string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken(request('email'))->plainTextToken;

        return $this->sendResponse([
            'token' => $token,
            'user' => $user
        ]);
    }


    public function logout(Request $request): string{
        $user = $request->user();
        $user->tokens()->delete();
        return 'tokens deleted';
    }

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
            ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        $token = $user->createToken(request('email'))->plainTextToken;

        return $this->sendResponse(
            [
                'token' => $token,
                'user' => $user
            ],
            'User Registered',
            200
        );
    }


}
