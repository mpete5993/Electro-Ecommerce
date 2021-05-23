@include('admin.layouts.header')

        <div class="admin-content">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-md-12 box-container" style="margin-top: 20px; ">
                            <!-- general form elements -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title"> <i class="fa fa-shopping-bag" style="margin-right: 20px;color: #4da5e2;"></i> Products</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="admin-tables">
  
                                  <div class="searchItems">
                                      <input type="text"  id="myInput" onkeyup="myFunction()" placeholder="Search for Address">
                                  </div>
                                  <table class="itemsTable" id="myTable">
                                      <tr class="tableHeader">
                                          <th>Name</th>
                                          <th>Status</th>
                                          <th>Brand</th>
                                          <th>Price</th>
                                          <th>Old Price</th>
                                          <th>Details</th>
                                          <th>Image</th>
                                          <th>Action</th>
                                      </tr>
                                      @foreach ($products as $product)
                                          <tr>
                                              <td> 
                                                  {{ $product->product_name }}
                                              </td>
                                              <td> 
                                                @if ($product->status == false)
                                                  <span class="text-danger">Out Stock</span>
                                                @elseif($product->status == true)
                                                <span class="text-success">In Stock</span>
                                                @endif 
                                              </td>
                                              <td>{{ $product->brand->name }} </td>
                                              <td>R{{ $product->current_price }}  </td>
                                              <td>R{{ $product->previous_price }}  </td>
                                              <td>{{ $product->details }}  </td>
                                              <td>
                                                  <img src=" {{ asset( $product->image )}} " alt="" width="60px" height="60px">
                                              </td>
                                              <td class="action">
                                                  <a href=" {{ route('admin.products.edit', $product->id)}} "><i class="fa fa-edit text-success"title="Edit property"></i></a>
                                                  <form action=" {{route('admin.products.destroy', $product->id) }} " method="post">
                                                      @csrf
                                                      {{ method_field('DELETE') }}
                                                      <button class="btn-destroy" title="Delete property"><i class="fa fa-trash-o text-danger" ></i></button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </table>
                                  {{ $products->links() }}
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