@include('layouts.header')

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
                        <li class="active"><a href="{{ url('/shoppingcart') }} ">Shopping Cart</a></li>
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
                        <h3 class="breadcrumb-header">Shopping cart</h3>
                        <ul class="breadcrumb-tree">
                            <li><a href=" {{ url('/') }} ">Home</a></li>
                            <li><a href=" {{ url('/store') }} ">shop</a></li>
                            <li class="active">shopping cart</li>
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
                <div class="col-lg-10 cart__header">
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
                        <p>{{ Cart::instance('default')->count() }} Item(s) in the shopping Cart</p>
                    </div>
                </div>
            </div>
            <!-- row -->

             <!-- row -->
            @if (Cart::content()->count() > 0)
                @foreach (Cart::content() as $item)
                <div class="row item__container">
                    <div class="col-lg-10 item_list ">
                        <div class="row cart__item">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="product__img">
                                    <a href="product/{{ $item->model->slug }}">
                                            <img src=" {{ asset('storage/' . $item->model->image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
                                <div class="product__name">
                                    <h5><b><a href="product/{{ $item->model->slug }}"><b> {{ $item->model->Name }} </b></a></b></h5>
                                    <p> {{ $item->model->details }} </p>
                                </div>
                                <div class="">
                                    <p><b>Price:</b> R {{ $item->model->current_price }}</p>
                                    <p class="text-success">In stock</p>
                                </div>
                            </div>
                            <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12">
                                <div class="">
                                    <h6  style="color: #fff;"><b>Subtotal:</b> R {{ $item->subtotal() }}</h6>
                                </div>
                                <div class="product__qty">
                                    <div class="qty-label">
                                                <h6 style="color: #fff;"><b>Qty</b></h6>
                                                <div class="input-number" style="color: #1E1F29;">
                                                    <input type="number" name="qty" value="{{ $item->qty }}">

                                                    <a
                                                        href=" {{ route('cart.incr', ['id' => $item->rowId, 'qty' => $item->qty]) }} ">
                                                        <span class="qty-up">+</span>
                                                    </a>
                                                    <a
                                                        href=" {{ route('cart.decr', ['id' => $item->rowId, 'qty' => $item->qty]) }} ">
                                                        <span class="qty-down">-</span>
                                                    </a>
                                                </div>
                                            </div>
                                </div>
                                <div class="cart_action">
                                    <div class="">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit"><i class="fa fa-trash text-danger"></i> remove</button>
                                        </form>
                                    </div>
                                    <div class="">
                                        <form action=" {{ route('cart.wishlist', $item->rowId) }} " method="post">
                                            {{ csrf_field() }}
                                        <button type="submit"><i class="fa fa-heart text-danger"></i> Add to wishlist</button>
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
                        <p>No Items in the cart</p>
                        <a href=" {{ route('store.allproducts') }}" class="btn learn_more">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> GO BACK TO SHOP
                        </a>
                    </div>
                </div>
                
            @endif
            <!-- row -->
            <div class="row __update_cart">
                    <div class="col-lg-10">
                        {{-- <div class="">
                            <input type="text" class="coupon-code" placeholder="Coupon Code">
                            <button class="coupon-btn">apply coupon</button>
                        </div> --}}
                    </div>
                    <div class="col-lg-2">
                        {{-- <form action="  " method="post">
                            <button class="update_btn"><i class="fa fa-trash"></i> Empty Cart</button>
                        </form> --}}
                    </div>
                </div><hr>
            <!-- row -->
            <!-- items total price -->
            <div class="row">
                <div class="col-lg-4 __cart_total_container">
                    <div class="__cart_total">
                        <div class="cart-header">
                            <h5><b>CART TOTAL</b></h5>
                        </div>
                        <div class="">
                            <div class="subtotal">
                                <div class="">
                                    Subtotal :
                                </div>
                                <div class="">
                                    <b>R {{ Cart::subtotal() }} </b>
                                </div>
                            </div>
                            <div class="subtotal">
                                <div class="">
                                    Tax :
                                </div>
                                <div class="">
                                    <b>Tax Rate(15%): <br> R {{ Cart::tax() }}</b>
                                </div>
                            </div>
                            <hr>
                            <div class="subtotal">
                                <div class="">
                                    Total :
                                </div>
                                <div class="">
                                    <b>R {{ Cart::total() }}</b>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <a href=" {{route('checkout.index')}} " class="btn checkout">proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- items total price -->
            <!-- row -->
        </div>
        <!-- container -->
        <!-- SHOPPING CART -->

@include('layouts.footer')