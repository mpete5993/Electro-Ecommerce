<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Mpete - E-commerce</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
		<link rel="shortcut icon" href="{{ asset('app/img/pzo3KD2xG8kw4MBq1dAm.png') }}" type="image/png">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ secure_asset('app/css/bootstrap.min.css') }}"/>
	

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ secure_asset('app/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ secure_asset('app/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ secure_asset('app/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ secure_asset('app/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ secure_assetsecure_asset('app/css/style.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{ secure_asset('app/css/blog.css')}}"/>

		{{-- ratings --}}
		{{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">  --}}

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"> --}}

		<link href="{{ secure_asset('css/preview.css') }}" rel="stylesheet">
		

{{-- 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
	

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
							<ul class="header-links pull-left company_info">
								<li><a href="#"><i class="fa fa-phone"></i> +27748222222</a></li>
							</ul>	
						</div>
						<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
							<ul class="header-links pull-left company_info">
								<li><a href="mailto:Rhobetapty@gmail.com"><i class="fa fa-envelope"></i>Rhobetapty@gmail.com</a></li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
							<ul class="header-links pull-left company_info">
								<li><a href=""><i class="fa fa-map-marker"></i>40 Fichardt street Bloemfontein 9301</a></li>
							</ul>
						</div>

						<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
							<ul class="header-links pull-right logged_user">
								@guest
									<li class="nav-item">
										<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
									</li>
									@if (Route::has('register'))
										<li class="nav-item">
											<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
										</li>
									@endif
								@else
									<li class="nav-item dropdown">
										<img src="{{ URL::to('Images/')}}/{{ Auth::user()->avatar}} " width="25px" height="25px"
										style="border-radius: 10px;">

										<div class="dropdown">
											<button onclick="myFunction()" class="dropbtn">
												{{ Auth::user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i>
											</button>
											<div id="myDropdown" class="dropdown-content">
												<a href=" {{ url('profile') }} "><i class="fa fa-user"></i> My Profile</a>
												
												<a href=" {{ url('admin/dashboard') }} "><i class="fa fa-dashboard"></i>  Dashboard</a>
												
											   <a href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
														<i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
													@csrf
												</form>
											</div>
										  </div>
									</li>
								@endguest
							</ul>
							
						</div>
					</div>
					
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="header-logo">
								<a href="" class="logo">
									<img src=" {{asset('app/img/logo.png')}} " alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="header-search ">
								<form action="{{ route('search')}}" method="get">
									{{-- <input class="input" name="query" id="query" value="{{request()->input('query')}}" placeholder="Search here">
									<button class="search-btn">Search</button> --}}
									<input type="text" name="search" id="search" value="{{request()->input('search')}}"  class="searchbar" placeholder="Search here"><button class="searchBarBtn">Search</button> 
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 col-sm-12 col-xs-12 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div class="">
									<a href=" {{ url('wishlist') }}">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">{{ Cart::instance('wishlist')->count() }}</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle __cart_icon" data-toggle="dropdown"  aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ Cart::instance('default')->count() }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@if (Cart::instance('default')->count() > 0)

												@foreach (Cart::instance('default')->content() as $item)
													
													<div class="product-widget">
														<div class="product-img">
															<a href="{{ route('store.show',$item->model->slug)}} "> 
																<img src=" {{ asset($item->model->image)}} " width="60px" height="50px" alt="">
															</a>
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="{{ route('store.show',$item->model->slug)}} "> {{$item->model->product_name}} </a></h3>
															<h4 class="product-price"><span class="qty">1x</span>R {{$item->model->current_price}}</h4>
														</div>
														
													</div>
												@endforeach
												@else 
												<div class="product-widget">
													<div class="">
														<p>No Items in the cart</p>
													</div>
												</div>

											@endif	
										</div>
										<div class="cart-summary">
											<small>{{Cart::instance('default')->count()}} Item(s) selected</small>
										<h5>SUBTOTAL: R {{Cart::instance('default')->subtotal()}}</h5>
										</div>
										<div class="cart-btns">
											<a href=" {{route('cart.index')}} ">View Cart</a>
											<a href="{{route('checkout.index')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
	@yield('content')

