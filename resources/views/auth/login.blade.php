@include('layouts.header')

<div class="container-fluid">
    <div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Create account</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li class="active">results</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
        
        <!-- row -->
            <div class="row register_row ">
                <div class="col-lg-6 register_row">
                    <div class="register_container">
                        <div class="register_header">
                            <h5><b>LOGIN</b></h5>
                        </div>
                        <div class="form_container">
                            <form action="{{ route('login') }}" method="POST">
			                    {{@csrf_field()}}
                                <div class="">
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" autofocus><br>
                                    @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="password_container">
                                    <div class="">
                                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"><br>
                                        @error('password')
                                            <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="">
                                    <button class="register-btn">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->

</div>
@include('layouts.footer')

