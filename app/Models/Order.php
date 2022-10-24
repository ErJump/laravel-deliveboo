<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'total_price',
      ];
    
      public function plates(){
        return $this -> belongsToMany('App\Models\Plate');
      }

      public function user(){
        return $this -> belongsTo('App\User');
      }
}
