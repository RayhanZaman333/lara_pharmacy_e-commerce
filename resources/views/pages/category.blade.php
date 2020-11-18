@extends('layout.master')

@section('content')

<<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{ route('index') }}">Home</a></li>
						<li class="active"><a href="{{ route('category') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Category</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				@include ('partials.sidebar')

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Default Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										<li>
											<span>Show</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

								<!-- Product Grid -->

								<div class="cat_product-grid">

									<!-- Product -->
									
									@foreach($products as $product)

										@include('pages.products')

									@endforeach
								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<ul class="product_sorting">
										<li>
											<span>Show:</span>
											<span class="num_sorting_text">04</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>01</span></li>
												<li class="num_sorting_btn"><span>02</span></li>
												<li class="num_sorting_btn"><span>03</span></li>
												<li class="num_sorting_btn"><span>04</span></li>
											</ul>
										</li>
									</ul>
									<span class="showing_results">Showing 1–3 of 12 results</span>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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