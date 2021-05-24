@include('layouts.header')
    <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="{{ url('/') }} ">Home</a></li>
						<li class="active"><a href="{{ url('/store') }}">Shop</a></li>
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
						<ul class="breadcrumb-tree">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/store') }}">All Categories</a></li>
							<li class="active"> {{ $categoryName}} </li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
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
											<p class="product-category">{{implode(',',$product->category()->get()->pluck('name')->toArray())}} </p>
											<h3 class="product-name"><a href=" {{ route('store.show', $product->slug) }} "> {{ $product->product_name}} </a></h3>
											<h4 class="product-price">R{{ $product->current_price}} <del class="product-old-price">R{{ $product->previous_price}}  </del></h4>
										</div>
									</div>
								@endforeach
							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1"><a href=" ">Low to High</a></option>
										<option value="1"><a href=" ">High to Low</a></option>
									</select>
								</label>

								<label>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							@if (session()->has('message'))
								<div class="alert alert-success" id="action-alert">
									<i class="fa fa-check-circle" aria-hidden="true"></i>
									{{session()->get('message')}} | <a href=" {{route('cart.store')}} ">View Cart</i></a>
								</div>
							@endif

							@if (count($errors) > 0)
								<ul>
									@foreach ($errors as $error)
										<li> {{$error}} </li>
									@endforeach
								</ul>
							@endif

							<div class="clearfix visible-sm visible-xs"></div>
                            
                            @forelse ($products as $product)
                            <div class="col-md-4 col-xs-6">
                                <!-- product -->
                                <div class="product">
                                    <a href=" {{ route('store.show', $product->slug)}} ">
                                        <div class="product-img">
                                            <img src=" {{ asset($product->image) }} " alt="">
                                            <div class="product-label">
                                                {{-- <span class="sale">-30%</span>
                                                <span class="new">NEW</span> --}}
                                            </div>
                                        </div>
                                    </a>
                                <div class="product-body">
									<p class="product-category">{{implode(',',$product->category()->get()->pluck('name')->toArray())}} </p>
                                        <h3 class="product-name"><a href=""> {{ $product->product_name }} </a></h3>
                                        <h4 class="product-price">R{{ $product->current_price }}<del class="product-old-price">R{{ $product->previous_price }} </del></h4>
                                        
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                                
                                                </div>
                                            <div class="add-to-cart">
                                                <form action=" {{ route('cart.store') }} " method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value=" {{$product->id}} ">
                                                    <input type="hidden" name="name" value="{{$product->product_name}} ">
                                                    <input type="hidden" name="price" value="{{$product->current_price}} ">
                                                    <input type="hidden" name="qty" value="1">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- /product -->
							</div>
							@empty
							<div class=""style="text-align:left;">
								No Item(s) found
							</div>
                            @endforelse
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							{{ $products->appends(request()->input())->links() }}
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@include('layouts.footer')