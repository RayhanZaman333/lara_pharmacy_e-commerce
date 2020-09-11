@extends('admin.layouts.master')

@section('content')          

		<!-- Page Title Header Starts-->
	    <div class="row page-title-header">
	       	<div class="col-12">
	         	<div class="page-header">
	            	<h4 class="page-title">Brands</h4>
	          	</div>
	        </div>
	    </div>
	    <!-- Page Title Header Ends-->
		
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
                @include('admin.partials.messages')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th> Serial No. </th>
                      <th> Name </th>
                      <th> Description </th>
                      <th> Added Date & Time</th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($brand as $brad)
                    <tr>
                      <td> {{ $brad -> id }} </td>
                      <td> {{ $brad -> name }} </td>
                      <td> {{ $brad -> description }} </td>
                      <td> {{ $brad -> created_at }} </td>
					  <td>
                        @if($brad->status == "Active")
							<label class="badge badge-success">{{ $brad -> status }}</label>
						@else
							<label class="badge badge-warning">{{ $brad -> status }}</label>
						@endif
            </td>
            <td>
      						<a href="{{ route('admin.brand.edit' , $brad->id) }}" class="btn btn-primary">Edit</a>
      						<a href="#deleteModal{{ $brad->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <div class="modal fade" id="deleteModal{{ $brad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header"> 
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                          <button type="buttone" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer"> 
                          <form action="{{ route('admin.brand.delete' , $brad->id) }}" method="post"> 
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                          
                        </div>
                      </div>
                    </div>
					       </td>
                </tr>
               @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

@endsection