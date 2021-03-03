<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'country', 
        'location', 'rating', 'link',
        'details', 'image_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function cultures(){
        return $this->belongsToMany(Culture::class,  'culture_sight', 'sight_id', 'culture_name');
    }

    public function natures(){
        return $this->belongsToMany(Nature::class, 'nature_sight', 'sight_id', 'nature_name');
    }
}
