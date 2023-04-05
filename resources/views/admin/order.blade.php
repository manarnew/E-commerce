<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
 @include('admin.sidebar')
      <!-- partial -->
@include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button"class="close"
                data-dismiss="alert"aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
        @endif
            <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">phone</th>
                      <th scope="col">Product title</th>
                      <th scope="col">Qunatity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Pyament Status</th>
                      <th scope="col">Delivery Status</th>
                      <th scope="col">Image</th>
                      <th scope="col">Delivered</th>
                      <th scope="col">Print PDF</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($Orders as $data)
                    <tr>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->address }}</td>
                      <td>{{ $data->product_title }}</td>
                      <td>{{ $data->quantity }}</td>
                      <td>{{ $data->price }}</td>
                      <td>{{ $data->payment_status }}</td>
                      <td>{{ $data->delivery_status }}</td>
                      <td ><img style="height: 60px; width:60px;"  src="/product/{{ $data->image }}" alt="" class="rounded mx-auto d-block"></td>
                       <td>
                        @if ($data->delivery_status=='processing')
                        <a onclick="return confirm('Are You Sure this product is Deliverd !!!')" href="{{ url('delivered',$data->id) }}"class="btn btn-primary">Delivered</a>
                       @else
                       <p style="color:blue">Delivered</p>
                        @endif
                      </td>
                      <td>
                        <a href="{{ url('print_pdf',$data->id) }}"class="btn btn-secondary">Print PDF</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                 
                </table>
                <br>
                <br>
                  {!!$Orders->withQueryString()->links('pagination::bootstrap-5') !!}
                
          </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>