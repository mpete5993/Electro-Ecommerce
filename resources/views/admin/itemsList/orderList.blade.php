@include('admin.layouts.header')

        <div class="admin-content">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="col-lg-12 col-md-12 box-container" style="margin-top: 20px; ">
                            <!-- general form elements -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title"> <i class="fa fa-shopping-bag" style="margin-right: 20px;color: #4da5e2;"></i> Orders</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="admin-tables">
  
                                  <div class="searchItems">
                                      <input type="text"  id="myInput" onkeyup="myFunction()" placeholder="Enter product name">
                                  </div>
                                  <table class="itemsTable" id="myTable">
                                      <tr class="tableHeader">
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Subtotal</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Payment Gateway</th>
                                        <th>Action</th>
                                      </tr>
                                      @foreach ($orders as $order)
                                          <tr>
                                              <td> 
                                                  {{ $order->billing_name }}
                                              </td>
                                              <td> 
                                                @if ($order->shipped == false)
                                                  <span class="text-danger">Not Shipped</span>
                                                @elseif($order->shipped == true)
                                                <span class="text-success"> Shipped</span>
                                                @endif 
                                              </td>
                                              <td>{{ $order->billing_email}} </td>
                                              <td>{{ $order->billing_address }}, {{$order->billing_province}} <br>
                                                {{$order->billing_city}}, {{$order->billing_country}}, {{$order->billing_zip}}
                                                </td>
                                              <td>{{ $order->billing_phone }}  </td>
                                              <td>R{{ $order->billing_subtotal }}  </td>
                                              <td>R{{ $order->billing_tax }}  </td>
                                              <td>R{{ $order->billing_total }}  </td>
                                              <td>{{ $order->payment_gateway}}  </td>
                                              <td class="action">
                                                <a href=" {{ route('admin.orders.show', $order->id)}} "><i class="fa fa-eye text-primary"title="Edit property"></i></a>
                                                <a href=" {{ route('admin.orders.edit', $order->id)}} "><i class="fa fa-edit text-success"title="Edit property"></i></a>
                                                  <form action=" {{route('admin.orders.destroy', $order->id) }} " method="post">
                                                      @csrf
                                                      {{ method_field('DELETE') }}
                                                      <button class="btn-destroy" title="Delete property"><i class="fa fa-trash-o text-danger" ></i></button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </table>
                                  {{ $orders->links() }}
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