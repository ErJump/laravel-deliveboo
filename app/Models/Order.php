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
        'order_list',
        'order_date',
        'total_price',
      ];
    
      public function plates(){
        return $this -> belongsToMany('App\Models\Plate')
        ->withPivot('quantity');
      }

      public function user(){
        return $this -> belongsTo('App\User');
      }
}
