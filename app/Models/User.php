<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\APIPasswordResetNotification;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Models\Story;


class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory, Notifiable, HasApiTokens;
    public $error_message = "";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'country',
        'birthday', 
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function stories(){
        return $this->hasMany(Story::class);
    }

    /*
    Bookmarks
    */
    public function restaurants(){
        return $this->belongsToMany(Restaurant::class, 'restaurant_user', 'user_id', 'restaurant_id');
    }

    public function sights(){
        return $this->belongsToMany(Sight::class);
    }

    public function entertainments(){
        return $this->belongsToMany(Entertainment::class, 'entertainment_user', 'user_id', 'entertainment_id');
    }


    /*
    interests
    */

    public function cultures(){
        return $this->belongsToMany(Culture::class, 'culture_user', 'user_id', 'culture_name')->withTimestamps();
    }

    public function cuisines(){
        return $this->belongsToMany(Cuisine::class, 'cuisine_user', 'user_id', 'cuisine_name')->withTimestamps();
    }

    public function natures(){
        return $this->belongsToMany(Nature::class, 'nature_user', 'user_id', 'nature_name')->withTimestamps();
    }

    /**
 * Send a password reset notification to the user.
 *
 * @param  string  $token
 * @return void
 */
public function sendPasswordResetToken()
{
    do{
        $token = Str::random(8);
        $signature = hash('md5', $token);
        $exists = DB::table('password_resets')->where([
            ["user_email", $this->email],
            ['token', $signature]
        ])->exists();
    }while($exists);

    try{
        $this->notify(new APIPasswordResetNotification($token));
        return DB::table('password_resets')->updateOrInsert([
            "user_email" => $this->email,
            "token" =>$signature,
            "expires_at" => Carbon::now()->addMinutes(30),
        ]);
    }catch(Throwable $th){
        $this->error_message = $th->getMessage();
        return false;
    }
    
}

public function getErrorMessage(){
    return $error_message;
}

}
