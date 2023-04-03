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
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="post">
                        @csrf
                        <input type="text" name="categroy" placeholder="Write category name"
                        class="input_color">
                        <input type="submit" value="Add Category"  class="btn btn-primary">
                    </form>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Category name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                      <tr>
                        <td>{{ $data->category_name }}</td>
                        <td>
                        <a onclick="return confirm('Are You Sure To Delete This')" href="{{ url('delete_category',$data->id) }}"class="btn btn-danger">Delete</a>
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