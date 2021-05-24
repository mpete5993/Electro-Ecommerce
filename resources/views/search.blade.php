@extends('layouts.footer')

@section('content')
    <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="{{ url('/') }} ">Home</a></li>
						<li class=""><a href="{{ url('/store') }}">Shop</a></li>
						<li><a href="{{ url('/about') }} ">About us</a></li>
						<li><a href="{{ url('/blog') }} ">Blog</a></li>
						<li><a href="{{ url('/contact') }} ">Contact Us</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Search results</h3>
						<ul class="breadcrumb-tree">
							<li><a href="">Home</a></li>
							<li class="active">results</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p> {{$products->count()}} results for '<b> {{request()->input('search')}}</b> '</p>
				</div>
			</div><hr>
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8">
					
					<div class="table-responsive">
						@if ( $products->Count() == 0)
						<div class="search-result">
							<p>No product matches your search</p>
						</div>
						<div class="go-to-shop">
							<a href=" {{ route('store') }}" class=" learn_more"><i
                                    class="fa fa-shopping-cart" aria-hidden="true"></i> GO BACK TO SHOP</a>
						</div>
					@else
					@foreach ($products as $product)
					<div class="search-card text-center">
						<div class="search-card-body">
							<a href="{{route('store.show', $product->slug) }}">
							<img src=" {{asset($product->image)}}">
							</a>
							<a href="{{route('store.show', $product->slug) }}">
								<h5 class="card-title text-left">{{$product->product_name}}</h5>
							</a>
							<div class="search-details text-left">
								<p>
									<span class="text-success text-left">R{{$product->current_price}} </span>
								</p>
								{!! \Illuminate\Support\Str::limit($product->Description , 250) !!}
							</div>
						</div>
						<div class="search-card-footer text-muted">
							<a href="{{route('store.show', $product->slug) }}" class="view_more">
							View item <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
					  </div>
					@endforeach
					@endif
						
					</div>
					<div class="">
						{{$products->appends(request()->input())->links()}}
					</div>
					
				</div>
				<!-- ASIDE -->
				<div id="aside" class="col-md-3 col-sm-4">
					<!-- aside Widget -->
					<div class="categories">
						<h6>Categories</h6>
						<ul>
							@foreach ($categories as $category)
							<li><a href="{{ route('store', ['category' => $category->slug]) }}"> {{ $category->name }} </a></li>
							@endforeach
						</ul>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					{{-- <div class="aside">
						<h3 class="aside-title">Price</h3>
						<div class="price-filter">
							<div id="price-slider"></div>
							<div class="input-number price-min">
								<input id="price-min" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
							<span>-</span>
							<div class="input-number price-max">
								<input id="price-max" type="number">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>
					</div> --}}
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<div class="checkbox-filter">
							<div class="categories">
								<h6>Brands</h6>
								<ul>
									@foreach ($brands as $brand)
										<li><a href="{{ route('store', ['brand' => $brand->slug]) }}"> {{ $brand->name }} </a></li>
									@endforeach
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /aside Widget -->

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Top selling</h3>
							@foreach ($top_selling as $product)
								
								<div class="product-widget">
								<a href=" {{ route('store.show', $product->slug) }} ">
									<div class="product-img">
										<img src=" {{ asset($product->image) }} " alt="">
									</div>
								</a>
									<div class="product-body">
										{{-- <p class="product-category">{{implode(',',$product->categories()->get()->pluck('name')->toArray())}} </p> --}}
										<h3 class="product-name"><a href=" {{ route('store.show', $product->slug) }} "> {{ $product->product_name}} </a></h3>
										<h4 class="product-price">R{{ $product->current_price}} <del class="product-old-price">R{{ $product->previous_price}}  </del></h4>
									</div>
								</div>
							@endforeach
						
					</div>
					<!-- /aside Widget -->
				</div>
				<!-- /ASIDE -->
			</div>
		</div>
@endsection

@extends('layouts.header')

