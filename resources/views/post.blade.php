@include('layouts.header')

@section('content')
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
						<li class="active"><a href="{{ url('/blog') }} ">Blog</a></li>
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
						<h3 class="breadcrumb-header">Our Blog</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ url('/welcome') }}">Home</a></li>
							<li > <a href="{{ url('/blog') }}"> Blog</a></li>
							<li class="active">Blog Details</li>
							<li class="active"> {{ $post->title }} </li>
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
				<div class="col-lg-9 bg-">
					<!-- blog body -->
					<div class="row">
						<!-- blog body -->
						<!-- blog body -->
					</div>
					<!-- blog body -->

					<!-- row -->
					
<!---===== blog content ====== ---->
<div class="blog-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="blog-post-container">
                    <article>
                        <h6><a href=""> {{ $post->title}} </a></h6>
                        <div class="blog-post-date">
                            <span style="color: #777">Posted by  {{$post->user->name}}   {{ $post->created_at->diffForHumans()}} </span>
                        </div>
                    </article>
                    <div class="blog-post-img">
                        <img src=" {{ asset($post->image)}} " alt="">
                    </div>
                    <div class="blog-post-content">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="blog-comment-container">
                    <div class="comment-header">
                        <h6><i class="fa fa-comments-o" aria-hidden="true"></i> Comments</h6>
                    </div>
                    @if ($comments->count() > 0)
                        
                    @foreach ($comments as $comment)
                        <div class="post-comment">
                            <div class="comment-img">
                                <div class="">
                                    <img src=" {{ asset('Images/'.$comment->user->avatar)}} " alt="">
                                </div>
                                
                            </div>
                            <div class="comment-content">
                                {!!$comment->comment!!}
                            </div>
                            <div class="comment-user-info">
                                <span><i class="fa fa-user"></i> {{ $comment->user->name}} </span>
                                <span><i class="fa fa-calendar"></i> {{ $comment->created_at->diffForHumans()}} </span>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="comment-user-info">
                        <span class=""> Be the first to comment <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                        </span>
                    </div>
                    @endif
                        <div class="my-2 p-2">
                            {{ $comments->links() }}
                        </div>
                        <div class="comment-user-info">
                            <span class=""> showing {{$comments->count() }} - {{ $comments->total() }} comments</span>
                        </div>
                    <div class="comment-form ">
                        @guest
                            <a href=" " class="learn_more">
                                <span class="property-count">Login to comment</span>
                            </a>
                        
                        @else
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6><i class="fa fa-comment" aria-hidden="true" style="color: #ddd;"></i> Leave your Comment</h6>
                                </div>
							</div>
							<div class="row">
                                <div class="col-lg-12">
									<form action=" {{ route('comments.store', $post->id)}} " method="post">
										@csrf
										{{ method_field('POST') }}
										<div class="row comment-input ">
												{{-- <div class="col-lg-12 ">
													<input type="text" name="name" placeholder="Enter your Name">
													<input type="email" name="email" placeholder="Enter your Email">
												</div> --}}
												<div class="col-lg-7">
													<div class="" style="margin-top: 20px; margin-bottom:10px;">
														<textarea class="ckeditor form-control" name="comment">
												
														</textarea>
													</div>
													<div class="">
														<button>send <i class="fa fa-arrow-circle-o-right"></i></button>
													</div>
												</div>
										</div>
									</form>
								</div>
							</div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!---===== blog content ====== ---->
					<!-- /row-->

				</div>
				<!-- row -->
				<div class="col-lg-3 ">
					<!-- row -->
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
									<a href="{{ route('blog', ['tag' => $tag->slug]) }}" class="tags_links">{{ $tag->name }} </a>
                                @endforeach
						</div>
					</div>
					<!-- row -->

				</div>
				<!--  /row -->
			</div>
					<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 __our_Blog">
						<h2 class="text-left">RELATED POSTS</h2>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
                    <div class="col-lg-4 col-md-4 ">
                        <div class="latest_post_container">
                            <div class="latest_post_img">
                                <a href=" {{ url('blog-details') }} ">
                                    <img src="/app/img/2.jpg" alt="">
                                </a>
                            </div>
                            <div class="latest_post_content">
                                <div class="">
                                <h6> </h6>
                                <p>Posted by  <b>Marianne Rutherford</b>   on { </p>
                                </div>
                                <div class="">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecen...
                                </p></div>
                            </div>
                            <div class="">
                                <a href="" class="learn_more">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		</div>
		<!-- blog body  -->
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f82004899d50158"></script>
<script src="{{asset('CKeditor/ckeditor.js')}}"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>

@include('layouts.footer')

