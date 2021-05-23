@include('admin.layouts.header')

        <div class="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-md-12 box-container"
                            style="margin-top: 20px; display:flex; justify-content:center; align-items: center;">
                            <!-- general form elements -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> <i class="fa fa-plus-square"
                                        style="margin-right:20px;color: #4da5e2;"></i> Add New Property</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST" action=" {{ route('admin.products.store')}} " enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('POST') }}

                                    <div class="form-inputs">
                                        <input type="text" name="name" placeholder="Product Name">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-inputs">
                                                <input type="number" name="price" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-inputs">
                                                <input type="text" name="old_price" placeholder="Old Price">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-inputs">
                                                <input type="text" name="details" placeholder="Details">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inputs">
                                        <label for="">Select Brand</label><br>
                                        <select name="brand" id="">
                                            <option value="">Brands</option>
                                            @foreach ($brands as $brand)
                                                <option name="brand" value="{{$brand->id}}"> {{$brand->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inputs">
                                        <label for="tags">Select Categories</label><br>
                                        @foreach ($categories as $category)
                                        <input type="checkbox" name="categories[]" value="{{$category->id}}">
                                        <span style="color: #777777;"> {{ $category->name }} </span>
                                        @endforeach
                                    </div>
                                    
                                    <div class="form-inputs">
                                        <label for="Image">Image</label><br>
                                            <input type="file" name="image">
                                    </div>
                                    <div class="form-inputs">
                                        <textarea class="ckeditor form-control" name="description">
                                            
                                        </textarea>
                                    </div>
                                    <div class="form-inputs">
                                        <label for="tags">In Stock</label><br>
                                        <input type="checkbox" name="instock" id="">
                                    </div>
                                    <div class="form-inputs">
                                        <button><i class="fa fa-plus-square"></i> Add Property </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
    @include('admin.layouts.footer')