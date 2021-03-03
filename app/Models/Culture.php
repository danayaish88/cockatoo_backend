<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $keyType = 'string';


    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'culture_user', 'culture_name', 'user_id');
    }

    public function sights(){
        return $this->belongsToMany(Sight::class,  'culture_sight', 'culture_name', 'sight_id');
    }
}
