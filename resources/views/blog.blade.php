
@include('layouts.header')


    <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href=" {{ url('/store') }} ">Shop</a></li>
						<li><a href="{{ url('/about') }} ">About us</a></li>
						<li  class="active"><a href="{{ url('/blog') }} ">Blog</a></li>
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
						<h3 class="breadcrumb-header">Our Blog</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active">Blog</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		

		<!-- blog body -->
		<!-- blog body -->
		<div class="container blog_container">
			<!-- blog body -->
			<div class="row">
				<!-- blog body -->
				<div class="col-lg-8 bg-">
					<!-- blog body -->
					<div class="row">
						<!-- blog body -->
						<div class="col-lg-12">
							{{-- <div class="__Recent_post">
								<h3>RECENT POSTS</h3>
							</div> --}}
						</div>
						<!-- blog body -->
					</div>
					<!-- blog body -->

					<!-- row -->
					<div class="row">
						@foreach ($posts as $post)
							<div class="col-lg-6 col-md-6 ">
								<div class="latest_post_container">
									<div class="latest_post_img">
										<a href="  {{ route('post.show', $post->slug)}} ">
											<img src=" {{ asset($post->image) }} " alt="">
										</a>
									</div>
									<div class="latest_post_content">
										<div class="">
										<h6> </h6>
										<p>Posted by  <b> {{$post->user->name}} </b>  {{ $post->created_at->diffForHumans() }} </p>
										</div>
										<div class="">
											{!! Str::limit($post->content , 200)!!}
										</div>
									</div>
									<div class="">
										<a href="" class="learn_more">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						@endforeach
                    </div>
					<!-- /row-->
					<!-- row -->
					<div class="row">
						<div class="col-lg-12">
							<!-- store bottom filter -->
						<div class="store-filter clearfix">
							 {{-- <span class="store-qty">Showing {{$posts->count()}} - {{$posts->total()}} blog posts</span> --}}
							{{--<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul> --}}
							{{-- {{$posts->links()}} --}}
						</div>
						<!-- /store bottom filter -->
						</div>
					</div>
				</div>
				<!-- row -->
				<div class="col-lg-4 col-md-12 col-sm-12">
                
					<div class="widget">
						<div class="keywords">
								<form action=" http://127.0.0.1:8000/postSearch " method="get">
									<input type="text" name="postsearch" id="" value="" placeholder="Enter Keywords"><button><i class="fa fa-search"></i></button>
								</form>
						</div>
						<div class="categories">
							<h6>Categories</h6>
							<ul>
								@foreach ($categories as $category)
                                <li><a href="{{ route('blog', ['category' => $category->slug]) }}"> {{ $category->name }} </a></li>
                                @endforeach
							</ul>
						</div>
						<div class="related-blog-container">
							<h6>Popular Post</h6>
								@foreach ($popularPosts as $post)
								<div class="related-blog-post">
									<div class="related-post-img">
										<a href=" {{ route('post.show', $post->slug)}}"><img src="{{ asset($post->image) }} " alt=""></a>
									</div>
									<div class="related-post-content">
										<h6><a href="{{ route('post.show', $post->slug)}}"> {{ $post->title }} </a></h6>
										<span>Posted on {{ $post->created_at->diffForHumans() }}</span>
										{!! Str::limit($post->content , 50)!!}
									</div>
								</div>
								@endforeach
						</div>
						<div class="tags">
							<h6>Tags</h6>
								@foreach ($tags as $tag)
									<a href="{{ route('blog', ['tag' => $tag->slug]) }} " class="tags_links">{{ $tag->name }} </a>
                                @endforeach
                            </div>
					</div>
				</div>
				<!--  /row -->
			</div>
		</div>
		<!-- blog body  -->
@include('layouts.footer')
