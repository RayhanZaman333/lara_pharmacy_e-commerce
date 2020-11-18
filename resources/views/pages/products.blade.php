@foreach($products as $product)

	<div class="cat_product-item men">
		<div class="product discount product_filter">
			<div class="product_image">
				<a href="{{ route('single.show' , $product->id) }}"><img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->title }}"></a>
			</div>
			<div class="favorite favorite_left"></div>
			<div class="product_info">
				<h6 class="product_name"><a href="{{ route('single.show' , $product->id) }}">{{ $product->title }}</a></h6>
				<div class="product_price">${{ $product->price }}</div>
			</div>
		</div>
		<div class="cat_red_button cat_add_to_cart_button red_button add_to_cart_button">
			<form action="{{ route ('cart.store') }}" method="post"> 
				@csrf
				<input type="hidden" name="product_id" value="{{ $product->id }}">
				<button type="button" class="cart" value="{{ $product->id }}">add to cart</button>
			</form>
		</div>
	</div>

@endforeach