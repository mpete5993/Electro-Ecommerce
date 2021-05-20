        <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href=" {{ url('/') }} ">Home</a></li>
						<li><a href=" {{ url('/store') }} ">Shop</a></li>
						<li><a href="{{ url('/about') }} ">About us</a></li>
						<li><a href="{{ url('/blog') }} ">Blog</a></li>
                        <li><a href="{{ url('/contact') }} ">Contact Us</a></li>
                        <li><a href="{{ url('/shoppingcart') }} ">Shopping Cart</a></li>
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
						<h3 class="breadcrumb-header">Your wishlist</h3>
						<ul class="breadcrumb-tree">
							<li><a href=" {{ url('/')}} ">Home</a></li>
							<li class="active">wishlist</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        
        <!-- SHOPPING CART -->
        <!-- container -->
        <div class="container">
          
            <!-- row -->
            <div class="row cart__list">
                <div class="col-lg-10 cart__header bg-info">
                     @if (session()->has('message'))
                            <div class="alert alert-success" id="action-alert">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif
                    <div class="cart__count">
                        <p>{{ Cart::instance('wishlist')->count() }} Item(s) in your Wishlist</p>
                    </div>
                </div>
            </div>
            <!-- row -->
            <!-- row -->
            @if (Cart::instance('wishlist')->count() > 0)
                    
                @foreach (Cart::instance('wishlist')->content() as $item)
            <div class="row item__container">
                <div class="col-lg-10 item_list">
                    <div class="row cart__item">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <div class="product__img">
                               <a href="product/{{ $item->model->slug}}">
                                    <img src=" {{ asset('storage/'.$item->model->image)}} "  alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
                            <div class="product__name">
                                <h5><a href="product/{{ $item->model->slug}}"><b> {{$item->model->Name}} </b></a></h5>
                                <p> {{$item->model->details}} </p>
                            </div>
                            <div class="">
                                
                                <p class="text-danger">Out stock</p>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
                            <div class="">
                                <h6><b>Subtotal:</b>R{{$item->subtotal()}}</h6>
                            </div>
                            
                            <div class="cart_action">
                                <div class="">
                                    <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button title="Delete item" type="submit"><i class="fa fa-trash text-danger"></i> remove</button>
                                    </form>
                                </div>
                                <div class="">
                                    <form action=" {{route('wishlist.show', $item->rowId)}} " method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$item->id}}">
									<input type="hidden" name="name" value="{{$item->Name}}">
									<input type="hidden" name="price" value="{{$item->current_price}}">
                                    <button type="submit"><i class="fa fa-shopping-cart text-danger"></i> Add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
            <div class="row">
                <div class="col-lg-4">
                    <p>No Items in the Wishlist</p>
                <a href=" {{ route('store.allproducts')}}" class="btn update_btn">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> GO BACK TO SHOP</a>
                </div>
            </div>
        </div>
        @endif
            <!-- row -->
        </div>
        <!-- container -->
        <!-- SHOPPING CART -->