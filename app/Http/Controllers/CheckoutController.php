<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Cart;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.checkout');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_no' => 'required',
            'shipping_address' => 'required'
        ]);

        $order = new Order();

        $order->name = $request->name;
        $order->phone_no = $request->phone_no;
        $order->email = $request->email;
        $order->message = $request->message;
        $order->shipping_address = $request->shipping_address;

        if(Auth::check())
        {
            $order->user_id = Auth::id();
        }

        $order->save();

        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $order->id;
            $cart->save();
        }

        return redirect()->route('index');
    }
}
