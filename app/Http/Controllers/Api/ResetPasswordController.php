<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function setNewAccountPassword(Request $request){
        $rules = [
            'user_email' =>'required|email|exists:users,email',
            'password_token' => 'required|string|max:8',
            'password' => 'required|confirmed|string|max:45'
        ];
        
        $Validator = Validator::make($request->all(), $rules);

        if($Validator->fails()){
            return $this->errorMessage(true, $Validator->errors()->all());
        }

        $data = $Validator->validated();

        $VerifToken = PasswordReset::where([
            ['token', hash('md5', $data['password_token'])],
            ['token_type', 20], // 20 is: password verif token
            ['user_email', $request->user_email]
        ])->first();

        if($VerifToken == null){
            return $this->sendResponse(true, 'Invalid token for resetting password');
        }

        $user = User::where([
            ['email', $request->user_email],
        ])->first();

        if($user == null){
            return $this->sendResponse(true, 'Token does not correspond to any existing user');
        }else if(Carbon::now()->greaterThan($VerifToken->expires_at)){
            return $this->sendResponse(true, 'The reset password token has expired');
        }

        $new_password = Hash::make($data['password']);
        $user->password = $new_password;
        $user->save();
        
        $VerifToken->expires_at = Carbon::now();
        $VerifToken->save();

        return $this->sendResponse(false, 'success');
    }

    public function sendResponse($error, $result, $user ='')
    {
        $response = [
            'error' => $error,
            'message' => $result,
            'user' => $user,
        ];

        return json_encode($response);
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return response(['message', trans($response)]);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response(['error', trans($response)], 422);
    }
    
}
