@extends('layouts.modal')

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
                    <li class="active"><a href="">Home</a></li>
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
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach ($productCollections as $productCollection)
                    
                <div class="col-md-3 col-xs-4">
                    <div class="shop">
                        <div class="shop-img">
                            <img src=" {{asset('storage/'.$productCollection->image)}} " height="200px" alt="">
                        </div>
                        <div class="shop-body">
                            {{-- <h3 style="text-transform: capitalize;"> {{implode(',',$productCollection->categories()->get()->pluck('name')->toArray())}}  <br>Collection</h3> --}}
                            <a href="{{ url('/store') }} " class="cta-btn">Shop now <i
                               class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                {{-- <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach ($RelatedProduct as $product)
                                        <div class="product">
                                            <a href="product/{{ $product->slug }}">
                                                <div class="product-img">
                                                    <img src=" {{ asset('storage/' . $product->image) }} " alt="">
                                                    <div class="product-label">
                                                        {{-- <span class="sale">-30%</span>
                                                        <span class="new">NEW</span> --}}
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category">
                                                    
                                                     {{-- {{$product->categories->name}} --}}
                                                </p>
                                                <h3 class="product-name"><a href="#">{{ $product->Name }}</a></h3>
                                                <h4 class="product-price">R{{ $product->current_price }}<del
                                                        class="product-old-price">R{{ $product->current_price }}</del>
                                                </h4>
                                                {{-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> --}}
                                                {{-- <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="quick-view product_modal"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div> --}}
                                            </div>
                                            <div class="add-to-cart">
                                                <form action=" {{ route('cart.store') }} " method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->Name }}">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->current_price }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                        add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="{{ url('/store') }} ">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    @foreach ($RelatedProduct as $product)
                                        <div class="product">
                                            <a href="product/{{ $product->slug }}">
                                                <div class="product-img">
                                                    <img src=" {{ asset('storage/' . $product->image) }} " alt="">
                                                    <div class="product-label">
                                                        {{-- <span class="sale">-30%</span>
                                                        <span class="new">NEW</span> --}}
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                {{-- <p class="product-category">{{implode(',',$product->categories()->get()->pluck('name')->toArray())}} </p> --}}
                                                <h3 class="product-name"><a href="#">{{ $product->Name }}</a></h3>
                                                <h4 class="product-price">R{{ $product->current_price }}<del
                                                        class="product-old-price">{{ $product->previous_price }}</del>
                                                </h4>
                                                {{-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> --}}
                                                {{-- <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div> --}}
                                            </div>
                                            <div class="add-to-cart">
                                                <form action=" {{ route('cart.store') }} " method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->Name }}">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->current_price }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
                                                        add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <hr>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12 __our_Blog">
                    <h2 class="text-center">From Our Blog</h2>
                </div>
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <!-- post -->
                        <div class="__blog_post ">
                            <div class="related_blog_img">
                                <!-- blog post image -->
                                <a href="blog-details/{{$post->slug}}">
                                    <img src=" {{asset('storage/'.$post->image)}} " class="related_img">
                                </a>
                                <!-- blog post image -->
                            </div>

                            <div class="__post_content">
                                <div class="">
                                    <!-- blog post title -->
                                    <h4> {{$post->title}} </h4>
                                    <!-- blog post title -->
                                </div>
                                <div class="">
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</li>
                                        <li><i class="fa fa-comment-o"></i> {{$post->comments->count()}} Comments</li>
                                    </ul>
                                </div>
                                <div class="">
                                    <p>
                                        {!! \Illuminate\Support\Str::limit($post->body, 30)!!}
                                          <a  href="{{ url('blog-details/'.$post->slug) }}" class="__post_post">VIEW MORE</a>
                                    </p>
                                </div>

                            </div>
                            <!-- /post-->
                        </div>
                        <!--  /blog post column -->
                    </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

@extends('layouts.header')