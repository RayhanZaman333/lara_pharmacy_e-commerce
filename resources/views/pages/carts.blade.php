@extends('layout.master')

@section('content')

	<div class="container contact_container cart_area">
		<div class="row">
			<div class="col">
				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{ route('index') }}">Home</a></li>
						<li class="active"><a href="{{ route('carts') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
		@include('partials.messages')
		<div class="row">
			<div class="col-lg-12">
				@if(App\Cart::totalItems() > 0)
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

				<div class="cart_btn text-right mt-2"> 
					<a href="{{ route('category') }}" class="btn btn-primary mr-1">Add More Products</a>
					<a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
				</div>
				@else

				<div class="alert alert-warning"> 
					<h4>Your Cart is Empty!!!</h4>

					<a href="{{ route('category') }}" class="btn btn-primary mt-2">Add Products</a>
				</div>
				@endif
			</div>
		</div>
	</div>

@endsection