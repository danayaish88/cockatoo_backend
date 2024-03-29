<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'country',
        'points',
        'dateCreated',
        'shared'
    ];

    protected $casts = [
        'points' => 'array'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
