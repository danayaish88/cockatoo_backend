<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name', 'city', 'country',
        'rating', 'image'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'restaurant_id');
    }

    public function cuisines(){
        return $this->belongsToMany(Cuisine::class, 'cuisine_restaurant', 'restaurant_id', 'cuisine_name');
    }
}
