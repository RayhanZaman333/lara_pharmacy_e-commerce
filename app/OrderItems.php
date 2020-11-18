<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderItems extends Model
{

	public $fillable = [
    	'order_id',
    	'product_id',
    	'price',
    	'quantity',
    ];s

     public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
