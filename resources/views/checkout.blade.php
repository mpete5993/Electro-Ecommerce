@extends('layouts.modal')

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
                <li><a href="{{ url('/cart') }} ">Shopping Cart</a></li>
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
                <h3 class="breadcrumb-header">checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href=" {{ url('/') }} ">Home</a></li>
                    <li class="active">checkout</li>
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
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))

                    <div class="alert alert-success text-center">

                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                        <p>{{ Session::get('success') }}</p>

                    </div>

                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                @if (session()->has('message'))
                    <div class="alert alert-success">
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
            </div>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <form action="" role="form" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    {{ csrf_field() }}
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="address" id="address"
                                placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="city" placeholder="City" id="city" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="province" placeholder="province"
                                id="province" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="country" placeholder="Country"
                                id="country" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="text" name="zipCode" placeholder="ZIP Code"
                                id="postalcode" required>
                        </div>
                        <div class="form-group">
                            <input class="input form-control" type="tel" name="tel" placeholder="Telephone"
                                id="telephone" required>
                        </div>
                        {{-- <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                <label for="create-account">
                                    <span></span>
                                    Create Account?
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt.</p>
                                    <input class="input" type="password" name="password"
                                        placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div> ---}}
                    </div>
                    <div class="payment">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Payment Details</h4>
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="Card Number">Name on Card</label>
                                    <input class="input  form-control" type="text" name="cardOwner" id="name_on_card"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Card Number">Credit Card Number</label>
                                    <input type="text" class="form-control card-number" name="card-number" id="">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Card Number">Expiration Month</label>
                                    <input type="text" class="form-control card-expiry-month" name="card-expiry" id=""
                                        placeholder='MM' size='2'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='control-label'>Expiration Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Card Number">CVC Code</label>
                                    <input type="text" class="form-control card-cvc" name="card-code" id=""
                                        placeholder='ex. 311' size='4'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>
                                            Please correct the errors and try again.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Order notes -->
                            <div class="col-md-12">
                                <div class="order-notes"  style="margin-bottom: 10px;">
                                    <textarea class="input form-control" name="order_notes"
                                        placeholder="Order Notes"></textarea>
                                </div>
                            </div>
                            <!-- /Order notes -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="primary-btn order-submit" value="Place your Order">
                                </div>
                            </div>
                </form>
            </div>



            {{-- <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-default credit-card-box">

                        <div class="panel-heading display-table">

                            <div class="row display-tr">

                                <h3 class="panel-title display-td">Payment Details</h3>

                                <div class="display-td">

                                    <img class="img-responsive pull-right"
                                        src="http://i76.imgup.net/accepted_c22e0.png">

                                </div>

                            </div>

                        </div>

                        <div class="panel-body">



                            @if (Session::has('success'))

                                <div class="alert alert-success text-center">

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                                    <p>{{ Session::get('success') }}</p>

                                </div>

                            @endif



                            <form @csrf <div class='form-row row'>

                                <div class='col-xs-12 form-group required'>

                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>

                                </div>

                        </div>



                        <div class='form-row row'>

                            <div class='col-xs-12 form-group card required'>

                                <label class='control-label'>Card Number</label> <input autocomplete='off'
                                    class='form-control card-number' size='20' type='text'>

                            </div>

                        </div>



                        <div class='form-row row'>

                            <div class='col-xs-12 col-md-4 form-group cvc required'>

                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>

                            </div>

                            <div class='col-xs-12 col-md-4 form-group expiration required'>

                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>

                            </div>

                        </div>



                        <div class='form-row row'>

                            <div class='col-md-12 error form-group hide'>

                                <div class='alert-danger alert'>Please correct the errors and try

                                    again.</div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-xs-12">

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>

                            </div>

                        </div>



                        </form>

                    </div>

                </div>

            </div>

        </div> --}}

    </div>
    <!-- /Billing Details -->

    <!-- Shiping Details -->
    {{-- <div class="shiping-details">
        <div class="section-title">
            <h3 class="title">Shiping address</h3>
        </div>
        <div class="input-checkbox">
            <input type="checkbox" id="shiping-address">
            <label for="shiping-address">
                <span></span>
                Ship to a diffrent address?
            </label>
            <div class="caption">
                <div class="form-group">
                    <input class="input" type="text" name="first-name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="last-name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input class="input" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="country" placeholder="Country">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                </div>
                <div class="form-group">
                    <input class="input" type="tel" name="tel" placeholder="Telephone">
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Shiping Details -->

    <!-- Order notes -->
    {{-- <div class="order-notes">
        <textarea class="input form-control" placeholder="Order Notes"></textarea>
    </div> --}}
    <!-- /Order notes -->
</div>

<!-- Order Details -->
<div class="col-md-5 order-details">
    <div class="section-title text-center">
        <h3 class="title">Your Order</h3>
    </div>
    <div class="order-summary">
        <div class="order-col">
            <div><strong>PRODUCT</strong></div>
            <div><strong>TOTAL</strong></div>
        </div>
        <div class="order-products">
                <div class="order-col">
                    <div class="">
                        <a href="">
                            <img src="" width="60px" height="50px"
                                alt="">
                        </a>
                    </div>
                    <div> product name</div>
                    <div>R5222.00</div>
                </div>
        </div>
        <div class="order-col">
            <div>Shiping</div>
            <div><strong>FREE</strong></div>
        </div>
        <div class="order-col">
            <div>Tax</div>
            <div><strong>R 7222.05</strong></div>
        </div>
        <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">R7852</strong></div>
        </div>
    </div>
    <hr>
    {{-- <div class="payment-method">
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-1">
            <label for="payment-1">
                <span></span>
                Direct Bank Transfer
            </label>
            <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-2">
            <label for="payment-2">
                <span></span>
                Cheque Payment
            </label>
            <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-3">
            <label for="payment-3">
                <span></span>
                Paypal System
            </label>
            <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
        </div>
    </div> --}}
    {{-- <div class="input-checkbox">
        <input type="checkbox" id="terms">
        <label for="terms">
            <span></span>
            I've read and accept the <a href="#">terms & conditions</a>
        </label>
    </div> --}}
</div>
<!-- /Order Details -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {

            var $form = $(".require-validation"),
                inputSelector = [
                    'input[type=email]',
                    'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),

                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;

            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');

            $inputs.each(function(i, el) {

                var $input = $(el);

                if ($input.val() === '') {

                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {

                e.preventDefault();

                Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                Stripe.createToken({

                    number: $('.card-number').val(),

                    cvc: $('.card-cvc').val(),

                    exp_month: $('.card-expiry-month').val(),

                    exp_year: $('.card-expiry-year').val()

                }, stripeResponseHandler);

            }
        });

        function stripeResponseHandler(status, response) {

            if (response.error) {

                $('.error')

                    .removeClass('hide')

                    .find('.alert')

                    .text(response.error.message);

            } else {

                /* token contains id, last4, and card type */

                var token = response['id'];

                $form.find('input[type=text]').empty();

                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                $form.get(0).submit();

            }
        }
    });

</script>


@include('layouts.footer')
