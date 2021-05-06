<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    

    protected $primaryKey = 'key'; // or null
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'key',
        'name', 'city', 'country',
        'rating', 'image'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'key');
    }

    public function cuisines(){
        return $this->belongsToMany(Cuisine::class, 'cuisine_restaurant', 'key', 'cuisine_name');
    }
}
