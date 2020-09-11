@extends('admin.layouts.master')

@section('content')          

		<!-- Page Title Header Starts-->
	    <div class="row page-title-header">
	       	<div class="col-12">
	         	<div class="page-header">
	            	<h4 class="page-title">Orders</h4>
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
                      <th> Order ID </th>
                      <th> Name </th>
                      <th> Phone No. </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($orders as $order)
                    <tr>
                      <td> {{ $loop -> index + 1 }} </td>
                      <td>#LE{{ $order -> id }} </td>
                      <td> {{ $order -> name }} </td>
                      <td> {{ $order -> phone_no }} </td>
          					  <td>
                        @if($order->processing)
          							  <label class="badge badge-primary">Processing</label>
            						@else
            							<label class="badge badge-warning">Not Processed</label>
            						@endif

                        @if($order->delivered)
                          <label class="badge badge-success">Delivered</label>
                        @else
                          <label class="badge badge-danger">Not Delivered</label>
                        @endif

                        <!-- @if($order->paid)
                          <label class="badge badge-success">Paid</label>
                        @else
                          <label class="badge badge-danger">Not Paid</label>
                        @endif -->
                      </td>
                      <td>
      						<a href="{{ route('admin.order.show', $order->id) }}" class="btn alert-primary">View Order</a>

                  <a href="#deleteModal{{ $order->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header"> 
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete?</h5>
                          <button type="buttone" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-footer"> 
                          <form action="{{ route('admin.order.delete' , $order->id) }}" method="post"> 
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