<!DOCTYPE html>
<html>
   <head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png"
   type="">
  <title>Famms - Fashion HTML Template</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css"
   href="{{asset('home/css/bootstrap.css')}}" />
  <!-- font awesome style -->
  <link href="{{asset('home/css/font-awesome.min.css')}}"
   rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
      @include('home.header')
         <!-- end header section -->
         
         <div>
         <br>
         <br>
         @if (session()->has('message'))
         <div class="alert alert-success">
             <button type="button"class="close"
             data-dismiss="alert"aria-hidden="true">x</button>
            {{ session()->get('message') }}
         </div>
     @endif
         <br>
         <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Product title</th>
                <th scope="col">Qunatity</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $totlPrice = 0; ?>
                @foreach ($cart as $data)
              <tr>
                <td>{{ $data->product->title }}</td>
                <td>{{ $data->quantity }}</td>
                <td>{{ $data->product->price }}</td>
                <td ><img width="140px" height="140px"  src="/product/{{ $data->product->image }}" alt="" class="rounded mx-auto d-block"></td>
                 <td>
                <a onclick="return confirm('Are sure to Remove This Product')"  href="{{ url('remove_cart',$data->id) }}"class="btn btn-danger">Remove</a>
                </td>
              </tr>
              <?php $totlPrice = $totlPrice + $data->price ;?>

              @endforeach
            </tbody>
          </table>
          <div>
            <h1 style="text-align: center; font-size:27px">Total Price: {{ $totlPrice }}</h1>
          </div>
          <div style="text-align: center;padding-top:20px;padding-bottom:20px">
            <h1 style="font-size:27px;padding-bottom:20px; color:blue">Proceed to Order</h1>
            <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
            <a href="" class="btn btn-danger">Pay Uding Card</a>
          </div>
        </div>
      
      <!-- footer start -->
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>