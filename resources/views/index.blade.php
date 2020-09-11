@extends('layout.master')

@section('content')

<!-- Slider -->

	<div class="main_slider" style="background-image:url({{asset('images/' . 'slider_1.jpg')}})">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Welcome to MediStore Pharmacy</h6>
						<h1>Focus on Purity and Quality</h1>
						<div class="red_button shop_now_button"><a href="{{ route('category') }}">explore now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				@foreach($category as $cat)
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url({{asset('images/categories/' . $cat->image)}})">
						<div class="banner_category">
							<a href="{{ route('category') }}">{{  $cat->name }}'s</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Products</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							@foreach( $category as $cat )
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter="#item-{{ $cat->id }}">{{ $cat->name }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
						@foreach( $product as $item )
						<div class="product-item" id="item-{{ $item->category->id }}">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="{{asset('images/products/' . $item->image)}}" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_info">
									<h6 class="product_name"><a href="{{ route('single') }}">{{ $item->title}}</a></h6>
									<div class="product_price">TK {{ $item->price }}</div>
								</div>
							</div>
							<!-- <div class="red_button add_to_cart_button"><a href="#" onclick="cart({{ $item->id }})">add to cart</a></div> -->
							
							<div class="red_button add_to_cart_button"> 
								<form action="{{ route ('cart.store') }}" method="post"> 
	 							@csrf
									<input type="hidden" name="product_id" value="{{ $item->id }}">
									<button type="button" class="cart" value="{{ $item->id }}">add to cart</button>
								</form>

							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deal of the week -->

	<div class="deal_ofthe_week" id="deal">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Deal Of The Week</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="{{ route('category') }}">explore now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Brands</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->
							@foreach($brand as $brad)
							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="{{asset('images/brands/' . $brad->image)}}" alt="">
										</div>
										<div class="favorite favorite_left"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blogs -->

	<div class="blogs" id="blog">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Latest Blog Articles</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('images/blogs/' . 'blog-1.png')}})"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Restore Your Health Naturally</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('images/blogs/' . 'blog-2.png')}})"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">A Better Healthier Life</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('images/blogs/' . 'blog-3.png')}})"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Focus on Purity and Quality</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	@include ('partials.benefit')

@endsection

@push('scripts')
	<script> 

		// addtocart

	

	// function cart(product_id)
	// {
	// 	console.log(product_id);
	// 	$.post( "http://localhost:8000/carts/store", 
	// 	{
	// 		product_id: product_id
	// 	})
	// 	.done(function(data){
	// 		// data = JSON.parse(data);
	// 		console.log(data.total_items);
	// 		if(data.status == 'success')
	// 		{
	// 			//toast
	// 			alertify.set('notifier','position', 'top-center');
 // 				alertify.success('Item Added to Cart Successfully!!! <br/>Total Items: ' +data.total_items+ '<br/>To chechkout: <a href="{{ route('carts') }}"><br/>Goto Checkout Page</a>');

	// 			$("#totalItems").value(data.total_items);
	// 		}
	// 	});

	// }

	$(document).ready(function(){
		$('.cart').on('click', function(){
			let id = $(this).attr('value');
			// console.log(id);

			// $.ajaxSetup({
			//     headers: {
			//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			//     }

			// }); 

			$.ajax({
				url: 'http://localhost:8000/carts/store',
				method: 'post',
            	data: { product_id: id },
            	headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            	dataType: 'json',
				success:function(data){
					// console.log(data.total_items);
					//toast

					alertify.set('notifier','position', 'top-center');
 					alertify.success('Item Added to Cart Successfully!!! Total Items: ' +data.total_items+ '<br/>Goto <a href="{{ route('carts') }}">Checkout Page</a>');

					$('#totalItems').html(data.total_items);
				}
			})
		});
	});

	</script>
@endpush