@include('admin.layouts.header')

        <div class="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="admin-header">
                            <h3><i class="fa fa-book" style="margin-right: 20px;color: #00c0ef;"></i>Orders</h3>

                        </div>
                        <div class="col-lg-12 col-md-12 box-container" style="margin-top: 20px; ">
                            <!-- general form elements -->
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title"> <i class="fa fa-plus-square" style="margin-right: 20px;color: #00c0ef;"></i> Edit Order</h3>
                              </div>
                              <!-- /.box-header -->
                              <!-- form start -->
                              <form method="POST" action=" {{ route('admin.orders.update',  ['order' =>$order->id])}} " enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-inputs">
                                    <input type="text" name="name" placeholder="Title" id="title" value="{{$order->billing_name}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_email}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_address}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_phone}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_subtotal}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_tax}}" disabled required>
                                </div>
                                <div class="form-inputs">
                                    <input type="text" name="title" placeholder="Title" id="title" value="{{$order->billing_total}}" disabled required>
                                </div>
                                @if ($order->shipped == false)
                                        <div class="form-inputs">
                                            <label for="tags">Ship Item?</label><br>
                                            <input type="checkbox" name="shipped" id="">
                                        </div>
                                        @else
                                        <div class="form-inputs">
                                            <label for="tags">Cancel Shipping?</label><br>
                                            <input type="checkbox" name="unshipped" id="">
                                        </div>
                                    @endif
                                <div class="form-inputs">
                                    <button> Update Order </button>
                                </div>
                            </form>
                            </div>
                            <!-- /.box -->
                  
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
            $('.ckeditor').ckeditor();
            });
            </script>
@include('admin.layouts.footer')
