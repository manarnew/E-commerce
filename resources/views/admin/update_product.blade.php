<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
                    <h2 class="h2_font">Update Product</h2>
                    <form action="{{ url('/edit_product',$product->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                     <div class="form-group">
                        <label for="">Product title</label>
                        <input required class="form-control input_color" type="text" name="title" placeholder="Write category name"
                        class="input_color" value="{{ $product->title }}">
                       </div>
                    
                       <div class="form-group">
                        <label for="">Product Description</label>
                        <input required class="form-control input_color" type="text" name="description" placeholder="Write a Description "
                        class="input_color"value="{{ $product->description }}">
                       </div>
                       <div class="form-group">
                        <label for="">Product price</label>
                        <input required class="form-control input_color" type="number" name="price" placeholder="Write a price"
                        class="input_color"value="{{ $product->price }}">
                       </div>
                       <div class="form-group">
                        <label for="">Product Quantity</label>
                        <input required class="form-control input_color" type="number"min="0" name="quantity" placeholder="Write a Quantity"
                        class="input_color" value="{{ $product->qunatity }}">
                       </div>
                       <div class="form-group">
                        <label for="">Discunt price </label>
                        <input class="form-control input_color" type="number" name="dis_price" placeholder="Write a Discunt"
                        class="input_color"value="{{ $product->discount_price }}">
                       </div>
                       <div class="form-group">
                        <label for="">Product Category</label>
                        <select required class="form-control input_color" name="category" id="Category"  class="input_color">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>
                            @foreach ($categroies as $category )
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                       </div>
                       <div class="form-group">
                        <label for="exampleFormControlFile1">Current Image</label>
                           <img src="/product/{{ $product->image }}" alt="">
                       </div>
                       <div class="form-group">
                        <label for="exampleFormControlFile1">Chamge  Image</label>
                        <input  type="file" class="form-control-file"name="image" id="exampleFormControlFile1">
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