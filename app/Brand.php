<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function product()
	{
		return $this->hasMany(Product::class , 'brand_id' , 'id');
	}
}
