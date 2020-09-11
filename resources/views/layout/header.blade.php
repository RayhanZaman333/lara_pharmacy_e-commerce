<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		@yield('title' , 'MEDISTORE')
	</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="MediStore Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	 <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/png">

	@include('partials.style')
	
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								@guest
									<li class="account">
										<a href="#">
											My Account
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>{{ __('Sign In') }}</a></li>
											@if (Route::has('register'))
												<li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ __('Register') }}</a>
												</li>
											@endif
										</ul>
									@else
										<li class="account">
											<a href="#"> 
												<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" width="50" alt="">
			                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
			                                </a>
			                                <ul class="account_selection dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			                                    <li><a href="{{ route('logout') }}"
			                                       onclick="event.preventDefault();
			                                                     document.getElementById('logout-form').submit();">
			                                        {{ __('Logout') }}
			                                    </a></li>

			                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                                        @csrf
			                                    </form>
			                                </ul>
										</li>
									</li>
								@endguest
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('partials.nav')