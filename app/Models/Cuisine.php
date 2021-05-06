<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $keyType = 'string';


    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'cuisine_user', 'cuisine_name', 'user_id');
    }

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class, 'cuisine_restaurant', 'cuisine_name', 'key');
    }
}
