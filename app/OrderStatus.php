<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public function cart()
    {
    	return $this->hasMany('App\Cart');
    }
}
