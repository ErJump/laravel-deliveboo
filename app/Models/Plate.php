<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    protected $fillable = [
        'name',
        'user_id',
        'ingredients',
        'description',
        'price',
        'discount',
        'availability',
        'image',
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
