<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
        'id',
        'name', 'city', 'country', 
        'rating', 'source', 'image'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'entertainment_user', 'user_id', 'entertainment_id');
    }


}
