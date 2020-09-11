@if($errors->any())
	<div class="alert alert-danger"> 
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<ul>
			@foreach($errors->all() as $error)
				<li><p>{{ $error }}</p></li>
			@endforeach
		</ul>
	</div>
@endif


@if(Session::has('success'))
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<p>{{ Session::get('success') }}</p>
	</div>
@endif

@if(Session::has('sticky_error'))
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<p>{{ Session::get('sticky_error') }}</p>
	</div>
@endif