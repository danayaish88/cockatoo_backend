<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city', 'country', 'location',
        'rating', 'link', 'details', 'type', 'image_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
