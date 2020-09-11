@extends('admin.layouts.master')

@section('content')          

		<!-- Page Title Header Starts-->
	    <div class="row page-title-header">
	       	<div class="col-12">
	         	<div class="page-header">
	            	<h4 class="page-title">Order #LE{{ $order->id }} Details</h4>
	          	</div>
	        </div>
	    </div>
	    <!-- Page Title Header Ends-->
		
        <div class="row">
          <div class="col-md-8 grid-margin">
            <div class="card">
              <div class="card-body">
                @include('admin.partials.messages')
                <h5 mb-2>Orderer Information</h5>
                
                <p><strong>Orderer Name: </strong> <span>{{ $order->name }}</span></p>
                <p><strong>Order Email: </strong> <span>{{ $order->email }}</span></p>
                <p><strong>Order Phone No: </strong> <span>{{ $order->phone_no }}</span></p>
                <p><strong>Order Shipping Address: </strong> <span>{{ $order->shipping_address }}</span></p>
                <p><strong>Order Message: </strong> <span>{{ $order->message }}</span></p>
                <p><strong>Payment Method: </strong> <span>Pay On Delivery</span></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"> 
            <div class="card mt-2">
              <div class="card-body">
                <!-- <h5 mb-2>Ordered Items</h5>
                
                @if($order->carts->count() > 0)
                <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub Amount</th>
                    <th>Cancel Order</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $total_price = 0;
                  @endphp

                  @foreach(App\Cart::totalCarts() as $cart)
                    <tr class="text-center">
                      <td>{{ $loop->index + 1 }}</td>
                      <td><a href="{{ route('single.show' , $cart->product->id) }}">{{ $cart->product->title }}</a></td>
                      <td><img src="{{ asset('images/products/' . $cart->product->image)}}" alt="Product" width="40" height="30"></td>
                      <td> 
                        <form class="form-inline" action="{{ route('cart.update' , $cart->id) }}" method="post"> 
                          @csrf
                          <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}">
                          <button type="submit" class="btn alert-success">Update</button>
                        </form>
                      </td>
                      <td>{{ $cart->product->price }} TK</td>
                      @php
                        $total_price += $cart->product->price * $cart->product_quantity;
                      @endphp
                      <td>{{ $cart->product->price * $cart->product_quantity}} TK</td>
                      <td> 
                        <form class="form-inline" action="{{ route('cart.delete', $cart->id) }}" method="post"> 
                          @csrf
                          <input type="hidden" name="cart_id">
                          <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                    <tr> 
                      <td colspan="4"></td>
                      <td><strong>Total Amount</strong></td>
                      <td colspan="2"><strong>{{ $total_price }} Taka Only</strong></td>
                    </tr>
                </tbody>
              </table>
              @endif -->
              </div>

              <div class="order_btn pb-4 ml-4"> 
                <form action="{{ route('admin.order.delivered', $order->id) }}" method="post" style="display: inline-block;"> 
                  @csrf
                  
                  @if($order->delivered)
                  <button type="submit" class="btn btn-danger">Cancel Delivery</button>
                  @else
                  <button type="submit" class="btn btn-success">Order Delivered</button>
                  @endif

                </form>

                <!-- <form action="{{ route('admin.order.paid', $order->id) }}" method="post" style="display: inline-block;> 
                  @csrf
                  
                  @if($order->paid)
                  <button type="submit" class="btn btn-danger">Payment Pending</button>
                  @else
                  <button type="submit" class="btn btn-success">Payment Completed</button>
                  @endif

                </form> -->
              </div>
            </div>
          </div>
        </div>

@endsection