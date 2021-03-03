<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nature extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $keyType = 'string';


    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'nature_user', 'nature_name', 'user_id');
    }

    public function sights(){
        return $this->belongsToMany(Sight::class, 'nature_sight', 'nature_name', 'sight_id');
    }
}
