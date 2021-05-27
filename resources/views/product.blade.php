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
						<li><a href=" {{ url('/') }} ">Home</a></li>
						<li class="active"><a href=" {{ url('/store') }} ">Shop</a></li>
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
							<li><a href="{{ url('/') }} ">Home</a></li>
							<li><a href="{{ url('/store') }} ">All Categories</a></li>
							<li class="active"> {{$product->product_name}} </li>
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
					<div class="col-md-6 product_img_div bg-">
						<div class="product_img">
							<img src=" {{ asset($product->image)}} " alt="">
						</div>
					</div>

					<!-- Product details -->
					<div class="col-md-6 ">
						<div class="product-details">
							<h2 class="product-name"></h2>
							<div>
								{{-- <div class="product-rating" style="color:#D10024;">
									<input id="input-1"   name="input-1" class="fa fa-star" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled=""> 
									
								</div> --}}
								
								<a class="review-link text-danger" href="#">{{$product->timesRated()}} Review(s) | Add your review</a>
							</div>
							<div>
							<h3 class="product-price">R {{ $product->current_price }} <del class="product-old-price">R {{ $product->previous_price }} </del></h3>
								@if ($product->status == false)
								<span class="text-danger">Out Stock</span>
								@elseif($product->status == true)
								<span class="text-success">In Stock</span>
								@endif
							</div>
							<div class="">
								<p><b>{{ $product->details }} </b></p>
							</div>
							<div class="my-2">
								{!! Str::limit($product->Description , 200) !!}
							</div>
							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
							@if (session()->has('message'))
								<div class="alert alert-success" id="action-alert">
									<i class="fa fa-check-circle" aria-hidden="true"></i>
									{{session()->get('message')}} | <a href=" ">View Cart</i></a>
								</div>
							@endif

							@if (count($errors) > 0)
								<ul>
									@foreach ($errors as $error)
										<li> {{$error}} </li>
									@endforeach
								</ul>
							@endif
							
							<form action="{{ route('cart.store') }}" method="POST">
								{{ csrf_field() }}
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number"  name="qty" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								
									<input type="hidden" name="id" value=" {{$product->id}} ">
									<input type="hidden" name="name" value="{{$product->product_name}} ">
									<input type="hidden" name="price" value="{{$product->current_price}} ">

									@if ($product->status == false)
										<button class="add-to-cart-btn" disabled style="cursor: not-allowed;"><i class="fa fa-shopping-cart"></i> add to cart</button>
									@elseif($product->status == true)
										<button class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i> add to cart</button>
									@endif
								</form>
							</div>

							<ul class="product-btns">
								{{-- {{$product = $item}}
								<form action="{{ route('cart.wishlist', $item->rowId)}}" method="post">
									{{ csrf_field() }}
									<button><i class="fa fa-heart-o"> add to wishlist</button>
								</form> --}}
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">{{implode(' , ',$product->category()->get()->pluck('name')->toArray())}} </a></li>
								
							</ul>
							
                
            

						</div>
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_mmjn"></div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								{{-- <li><a data-toggle="tab" href="#tab2">Details</a></li> --}}
								<li><a data-toggle="tab" href="#tab3">Reviews ({{$product->timesRated()}})</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row ">
										<div class="col-md-12 product_desciption">
											{!! $product->Description !!}
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								{{-- <div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div> --}}
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in ">
									<div class="row">
										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												@if (count($errors) > 0)
													<div class="alert alert-danger">
														@foreach ($errors->all() as $error)
															<p>
																 {{$error}}
															</p>
														@endforeach
													</div>
												@endif

												@if ($message = Session::get('success'))
													<div class="alert alert-success">
														<p><i class="fa fa-check-circle" aria-hidden="true"></i> </p>
													</div>
												@endif
											<form class="review-form" method="POST" action=" {{route('review.store')}} ">
												{{ csrf_field() }}
													<input class="input" type="text" name="name" placeholder="Your Name">
													<input class="input" type="email" name="email" placeholder="Your Email">
													<textarea name="review" class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															
															<input id="star5" name="rate" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rate" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rate" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rate" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rate" value="1" type="radio"><label for="star1"></label>
															<input type="hidden" name="id" required="" value="{{ $product->id }}">
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													@foreach ($reviews as $review)
													<li>
														<div class="review-heading">
															<h5 class="name"> {{$review->name}} </h5>
															<p class="date">{{$review->created_at->diffForHumans()}}</p>
															@if ($review->rating == 5)
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																</div>
															@elseif($review->rating == 4)
															<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															@elseif($review->rating == 3)
															<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															@elseif($review->rating == 2)
															<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															@elseif($review->rating ==1)
															<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															@endif
														</div>
														<div class="review-body">
															{{ $review->review }}
														</div>
														</li>
														@endforeach
												</ul>
												{{$reviews->links() }}
												
											</div>
										</div>
										<!-- /Reviews -->
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">You May Also Like</h3>
						</div>
						{{-- flash message --}}
						@if (session()->has('message'))
							<div class="alert alert-success" id="action-alert">
								<i class="fa fa-check-circle" aria-hidden="true"></i>
								{{session()->get('message')}} | <a href=" ">View Cart</i></a>
							</div>
						@endif

						@if (count($errors) > 0)
							<ul>
								@foreach ($errors as $error)
									<li> {{$error}} </li>
								@endforeach
							</ul>
						@endif
						{{-- flash message --}}
					</div>

					<!-- product -->
					@foreach ($popular as $product)
						
					
							<div class="col-md-3 col-xs-4">
								<!-- product -->
								<div class="product">
											<a href=" {{ route('store.show', $product->slug) }} ">	
												<div class="product-img">
													<img src="{{ asset($product->image)}}" alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
											</a>
											<div class="product-body">
												{{-- <p class="product-category">{{implode(',',$product->categories()->get()->pluck('name')->toArray())}} </p> --}}
												<h3 class="product-name"><a href=" {{ route('store.show', $product->slug) }} "> {{$product->product_name}} </a></h3>
											<h4 class="product-price">R{{$product->current_price}}  <del class="product-old-price">R{{$product->previous_price}}  </del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												{{-- <div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div> --}}
											</div>
											<div class="add-to-cart">
												<form action="{{ route('cart.store') }}" method="POST">
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
							@endforeach
							<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
		<script type="text/javascript">

			$("#input-id").rating();

		</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f82004899d50158"></script>
		
@endsection

@extends('layouts.header')
