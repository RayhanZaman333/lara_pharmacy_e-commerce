<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('id')->get();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.order.show', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);

        if($order->delivered)
        {
            $order->delivered = 0;
        }else{
            $order->delivered = 1;
        }
        $order->save();

        Session()->flash('success' , 'Order Delivery Status Changed Successfully !!!');
        return back();
    }

    // public function paid($id)
    // {
    //     $order = Order::find($id);

    //     if($order->paid)
    //     {
    //         $order->paid = 0;
    //     }else{
    //         $order->paid = 1;
    //     }
    //     $order->save();

    //     Session()->flash('success' , 'Payment Completed Successfully !!!');
    //     return redirect()->route('admin.order.index');
    // }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!is_null($order)) {
            $order->delete();
        }

        Session()->flash('success' , 'Order Deleted Successfully !!!');
        return back();
    }
}
