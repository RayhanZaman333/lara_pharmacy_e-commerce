@extends('layout.master')

@section('content')

	<div class="container contact_container cart_area">
		<div class="row">
			<div class="col">
				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{ route('index') }}">Home</a></li>
						<li class="active"><a href="{{ route('checkout') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="card"> 
			<div class="card-body">
				<h3>Confirm Items</h3>
				<hr>
				<div class="row">
					<div class="col-lg-7"> 
						@foreach(App\Cart::totalCarts() as $cart)
							<p> 
								{{ $cart->product->title }} ({{ $cart->product_quantity }} Items)- 
								<strong>{{ $cart->product->price }} TK</strong>
							</p>
						@endforeach

						<div class="cart_btn mt-2"> 
							<a href="{{ route('carts') }}" class="btn btn-primary mr-1">Change Items</a>
						</div>
					</div>
					<div class="col-lg-5"> 
						@php
							$total_price = 0;
						@endphp

						@foreach(App\Cart::totalCarts() as $cart)
							@php
								$total_price += $cart->product->price * $cart->product_quantity;
							@endphp
						@endforeach

						<p> 
							Total Amount: <strong>{{ $total_price }} Taka</strong>
						</p>
						<p> 
							Total Amount with Shipping Cost: <strong>{{ $total_price + App\Modification::first()->shipping_cost }} Taka</strong>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body"> 
						<h3>Shipping Information</h3>
						
						<form action="{{ route('checkout.store') }}" method="post"> 
							@csrf

							<div class="form-group"> 
								<label for="name">Receiver Name:</label>
								<input type="text" id="name" name="name" class="form-control" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : ''}}" required>
							</div>
							<div class="form-group"> 
								<label for="email">Email:</label>
								<input type="text" id="email" name="email" class="form-control" value="{{ Auth::check() ? Auth::user()->email : ''}}">
							</div>
							<div class="form-group"> 
								<label for="phone_no">Phone:</label>
								<input type="text" id="phone_no" name="phone_no" class="form-control" value="{{ Auth::check() ? Auth::user()->phone_no : ''}}" required>
							</div>
							<div class="form-group"> 
								<label for="shipping_address">Shipping Address:</label>
								<input type="text" id="shipping_address" name="shipping_address" class="form-control" value="{{ Auth::check() ? Auth::user()->shipping_address : ''}}" required>
							</div>
							<div class="form-group"> 
								<label for="message">Additional Message (Optional):</label>
								<textarea id="message" name="message" class="form-control"></textarea> 
							</div>
							<div class="form-group"> 
								<label for="shipping_address">Payment Method:</label>
								<input type="text" id="shipping_address" name="shipping_address" class="form-control" value="Pay On Delivery" disabled>
							</div>
							<div class="form-group"> 
								<button type="submit" class="btn btn-success">Order Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection