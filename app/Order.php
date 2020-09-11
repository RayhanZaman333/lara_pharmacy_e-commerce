<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
    	'user_id',
    	'ip_address',
    	'name',
    	'phone_no',
    	'shipping_address',
    	'email',
    	'message',
    	'processing',
    	'paid',
    	'delivered'
    ];

    public function user()
    {
    	return $this->belongsTo(user::class);
    }

    public function carts()
    {
    	return $this->hasMany(Cart::class);
    }
}
