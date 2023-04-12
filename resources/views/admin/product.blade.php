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
        padding-bottom:20px;
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
                <div class="div_center">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button"class="close"
                        data-dismiss="alert"aria-hidden="true">x</button>
                       {{ session()->get('message') }}
                    </div>
                @endif
                    <h2 class="h2_font">Add Product</h2>
                    <form action="{{ url('/add_product') }}" enctype="multipart/form-data" method="post">
                        @csrf
                     <div class="form-group">
                        <label for="">Product title</label>
                        <input required class="form-control" type="text" name="title" placeholder="Write category name"
                        class="input_color">
                       </div>
                    
                       <div class="form-group">
                        <label for="">Product Description</label>
                        <input required class="form-control" type="text" name="description" placeholder="Write a Description "
                        class="input_color">
                       </div>
                       <div class="form-group">
                        <label for="">Product price</label>
                        <input required class="form-control" type="number" name="price" placeholder="Write a price"
                        class="input_color">
                       </div>
                       <div class="form-group">
                        <label for="">Product Quantity</label>
                        <input required class="form-control" type="number"min="0" name="quantity" placeholder="Write a Quantity"
                        class="input_color">
                       </div>
                       <div class="form-group">
                        <label for="">Discunt price </label>
                        <input class="form-control" type="number" name="dis_price" placeholder="Write a Discunt"
                        class="input_color">
                       </div>
                       <div class="form-group">
                        <label for="">Product Category</label>
                        <select required class="form-control" name="category" id="Category"  class="input_color">
                            <option value="">Add a Category here</option>
                            @foreach ($categroies as $category )
                            <option value="{{ $category->id }} ">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                       </div>
                       <div class="form-group">
                        <label for="exampleFormControlFile1">Product Image</label>
                        <input required type="file" class="form-control-file"name="image" id="exampleFormControlFile1">
                      </div>
                       <div class="form-group">
                        <input type="submit" value="Add Product"  class="btn btn-primary">
                     </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>