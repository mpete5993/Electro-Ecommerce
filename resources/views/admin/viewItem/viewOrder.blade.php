@include('admin.layouts.header')

        <div class="admin-content">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-md-12 box-container" style="margin-top: 20px; ">
                            <!-- general form elements -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title"> <i class="fa fa-shopping-bag" style="margin-right: 20px;color: #4da5e2;"></i> View Order</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="admin-tables">
                                  <div class="">
                                    <div class="order-user-img">
                                        <img src="{{ asset('Images/'.$order->user->avatar)}}" alt="" >
                                    </div>
                                    <div class="order-user-info">
                                        <span><i class="fa fa-user"></i> {{$order->user->name}}</span>
                                        <span><i class="fa fa-envelope"></i> {{$order->user->email}}</span>
                                        <span><i class="fa fa-mobile-phone"></i> {{$order->billing_phone}}</span>
                                    </div>
                                  </div><hr>
                                  <div class="billing-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Billing Information</h5><hr>
                                        </div>
                                        <div class="col-lg-4">
                                            
                                            <div class="">
                                                <h6><i class="fa fa-address-card" aria-hidden="true"></i>Billing Address</h6>
                                                <p> {{$order->billing_address}} , {{$order->billing_province}} <br>
                                                    {{$order->billing_city}}, {{$order->billing_country}},<br>
                                                    {{$order->billing_zip}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <h6><i class="fa fa-money" aria-hidden="true"></i>Billing Total</h6>
                                                <p> <b>Subtotal :</b> R{{$order->billing_subtotal}} <br>
                                                     <b>Tax :</b> R{{$order->billing_tax}} <br>
                                                    <b>Total :</b> R{{$order->billing_total}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <h6><i class="fa fa-ship" aria-hidden="true"></i>Shipping Status</h6>
                                                @if ($order->shipped == true)
                                                    <p class="text-success"> Shipped <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i></p>
                                                @else
                                                <p class="text-danger">Not Shipped
                                                </p> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6><i class="fa fa-credit-card" aria-hidden="true"></i>Payment Gateway</h6>
                                            <p>
                                                <i class="fa fa-cc-stripe" aria-hidden="true"></i> stripe
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <h6><i class="fa fa-pencil" aria-hidden="true"></i>Order Notes</h6>
                                            <p>
                                                {!! $order->order_notes !!}
                                            </p>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="">
                                      
                                    @foreach ($order->products as $product)
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
                                  </div>
                              </div>
                              </div>
                              
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function myFunction() {
            // Declare variables
            let input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }
    </script>
    
@include('admin.layouts.footer')