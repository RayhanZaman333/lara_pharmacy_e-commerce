@extends('admin.layouts.master')

@section('content')          

		<!-- Page Title Header Starts-->
	    <div class="row page-title-header">
	       	<div class="col-12">
	         	<div class="page-header">
	            	<h4 class="page-title">Update Product</h4>
	          	</div>
	        </div>
	    </div>
	    <!-- Page Title Header Ends-->
		
        <div class="row">
          <div class="col-md-8 grid-margin">
            <div class="card">
              <div class="card-body">
                @include('admin.partials.messages')
                <form class="forms-sample" action="{{ route('admin.product.update' , $product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- @method("PATCH") -->
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name ="title" value="{{ $product -> title }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Category</label>
                    <input type="text" class="form-control" id="exampleInputName1" name ="category_id" value="{{ $product -> category_id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Brand</label>
                    <input type="text" class="form-control" id="exampleInputName1" name ="brand_id" value="{{ $product -> brand_id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Quantity</label>
                    <input type="text" class="form-control" id="exampleInputName1" name ="quantity" value="{{ $product -> quantity }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Price</label>
                    <input type="text" class="form-control" id="exampleInputName1" name ="price" value="{{ $product -> price }}">
                  </div>

                  {{-- <div class="form-group">
                    <label>Image</label>
                    <div class="input-group col-xs-12">
                      <img src="{{ asset('images/products/' . $product -> image) }}" height="100" width="100" alt="">
                    </div>  
                   </div>
                  <div class="form-group">
                  	<div class="input-group">
                  <input type="file" class="form-control file-upload-info" name="image" value="{{$product -> image}}">
                   </div>
                  </div> --}}

                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="description"> {{ $product -> description }}</textarea>
                  </div>

                  {{-- <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" id="exampleFormControlSelect1" class="form-control"> 
                      <option value="">Select Status</option>

                      @if($product->status == "Active")
                        <option value="" selected>{{ $product -> status }}</option>
                        <option value="Unavailable">Unavailable</option>
                      @elseif($product->status == "Unavailable")
                        <option value="Active">Active</option>
                        <option value="" selected>{{ $product -> status }}</option>
                      @endif
                    </select>
                  </div> --}}

                  <button type="submit" class="btn btn-success mr-2">Update</button>
                  <button class="btn btn-light"><a href="{{route('admin.product.index')}}">Cancel</a></button>
                </form>
              </div>
            </div>
          </div>
        </div>

@endsection