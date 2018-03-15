<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
    	return $this->hasMany('App\ProductImage');
    }

    public function item()
    {
    	return $this->hasMany('App\Item');
    }
}
