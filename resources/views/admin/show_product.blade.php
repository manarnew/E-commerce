<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style>
    .div_center{
        text-align: center;
        padding-top: 40px;
        padding-bottom:40px;
    }
    .h2_font{
        font-size: 40px;
        padding-bottom:40px;
    }
    .input_color{
        color: black;
    }
    .img_size{
        width: 150px;
        height: 150px;
    }
   
   </style>
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
                        <th scope="col">Product title</th>
                        <th scope="col">description</th>
                        <th scope="col">qunatity</th>
                        <th scope="col">category</th>
                        <th scope="col">Price</th>
                        <th scope="col">discount price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                      <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->qunatity }}</td>
                        <td>{{ $data->category }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->discount_price }}</td>
                        <td ><img width="250px" height="500px"  src="/product/{{ $data->image }}" alt="" class="rounded mx-auto d-block"></td>
                        <td>
                        <a onclick="return confirm('Are You Sure To Delete This')" href="{{ url('delete_product',$data->id) }}"class="btn btn-danger">Delete</a>
                        </td>
                         <td>
                        <a  href="{{ url('update_product',$data->id) }}"class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>