@extends('admin.layouts.master')

@section('content')          

		<!-- Page Title Header Starts-->
	    <div class="row page-title-header">
	       	<div class="col-12">
	         	<div class="page-header">
	            	<h4 class="page-title">User List</h4>
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
                      <th> User ID. </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Phone No.</th>
                      <th> Address </th>
                      <th> Status </th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($users as $user)
                    <tr>
                      <td> {{ $loop -> index + 1 }} </td>
                      <td> {{ $user -> id }} </td>
                      <td> {{ $user -> first_name }} {{ $user -> last_name }} </td>
                      <td> {{ $user -> email }} </td>
                      <td> {{ $user -> phone_no }} </td>
                      <td> {{ $user -> address }} </td>
					           <td>
                        @if($user->status == "Active")
          							<label class="badge badge-success">{{ $user -> status }}</label>
          						@else
          							<label class="badge badge-warning">{{ $user -> status }}</label>
          						@endif
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