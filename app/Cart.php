<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model
{
    public $fillable = [
    	'product_id',
    	'user_id',
    	'order_id',
    	'product_quantity',
    	'ip_address'
    ];

    public function user()
    {
    	return $this->belongsTo(user::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }


   	// total carts

    public static function totalCarts()
    {
    	if(Auth::check())
		{
			$carts = Cart::where('user_id', Auth::id())
                    	->where('order_id', NULL)
                    	->get();
		}else{
			$carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
		}

		return $carts;
    }

    // total item in the cart

    public static function totalItems()
    {
    	if(Auth::check())
		{
			$carts = Cart::where('user_id', Auth::id())
                    	->where('order_id', NULL)
                    	->get();
		}else{
			$carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
		}

		$total_item = 0;

		foreach ($carts as $cart) 
		{
			$total_item += $cart->product_quantity;
		}

		return $total_item;
    }
}
