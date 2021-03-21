<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'location',
        'country',
        'birthday'
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

    
    public function routes(){
        return $this->hasMany(Route::class);
    }

    /*
    Bookmarks
    */
    public function restaurants(){
        return $this->belongsToMany(Restaurant::class);
    }

    public function sights(){
        return $this->belongsToMany(Sight::class);
    }

    public function entertainments(){
        return $this->belongsToMany(Entertainment::class);
    }


    /*
    interests
    */

    public function cultures(){
        return $this->belongsToMany(Culture::class, 'culture_user', 'user_id', 'culture_name');
    }

    public function cuisines(){
        return $this->belongsToMany(Cuisine::class, 'cuisine_user', 'user_id', 'cuisine_name');
    }

    public function natures(){
        return $this->belongsToMany(Nature::class, 'nature_user', 'user_id', 'nature_name');
    }

}
