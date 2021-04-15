<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Models\PasswordReset;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public $error_message = "";

    public function sendResetLinkEmail(Request $request)
    {
        $rules = ['email' => 'required|email|exists:users,email'];
        
        $Validator = Validator::make($request->all(), $rules);

        if($Validator->fails()){
            return $this->errorMessage(true, $Validator->errors()->all());
        }

        $data = $Validator->validated();

        $user = User::where("email", $data['email'])->first();

        $reset_link_sent = $user->sendPasswordResetToken();

        if($reset_link_sent){
            return $this->errorMessage(false, "A password token has been sent to your email, please enter the token to reset your password");
        }

        return $this->errorMessage(true, $user->getErrorMessage());
    }

    public function errorMessage($result, $message = "")
    {
        $response = [
            'error'    => $result,
            'message' => $message,
        ];

        return json_encode($response);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response(['message', trans($response)]);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response(['error', trans($response)], 422);
    }

    public function validatePasswordResetToken(Request $request){
        $resetToken = PasswordReset::where([
            ['token', hash('md5', $request->password_reset_code)],
            ['token_type', 10], // 10 is: password reset token
            ['user_email', $request->user_email]
        ])->first();

        if($resetToken == null){
            $response = [
                'error'    => true,
                'message' => 'Invalid password reset code or email',
                'token' => '',
            ];
    
            return json_encode($response);
        }

        if(Carbon::now()->greaterThan($resetToken->expires_at)){
            $response = [
                'error'    => true,
                'message' => 'The password reset code given has expired',
                'token' => '',
            ];
    
            return json_encode($response);
        }
        $reset_token = $this->getResetIdentifierCode($resetToken);
        if($reset_token){
            $resetToken->expires_at = Carbon::now();
            $resetToken->save();
           
            $response = [
                'error'    => false,
                'message' => '',
                'token' => $reset_token,
            ];
            return json_encode($response);
            
        } else{
            return $this->errorMessage(true, $error_message);
            $response = [
                'error'    => true,
                'message' => $error_message,
                'token' => '',
            ];
            return json_encode($response);
        }
    }

    public function getResetIdentifierCode($resetToken){
        $token = STR::random(8);
    
        try{
            DB::table('password_resets')->insert([
                'user_email' => $resetToken->user_email,
                'token' => hash('md5', $token),
                'used_token' => $resetToken->id,
                'token_type'=> 20, // password verify token
                'expires_at' => Carbon::now()->addMinutes(30),
            ]);

            return $token;
        }catch(Throwable $th){
            $this->error_message = $th->getMessage();
            return false;
        }

    }
}
