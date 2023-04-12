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
         <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Product title</th>
                <th scope="col">Qunatity</th>
                <th scope="col">Price</th>
                <th scope="col">Pyament Status</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Image</th>
                <th scope="col">cancel Order</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($Orders as $data)
              <tr>
                <td>{{ $data->product->title }}</td>
                <td>{{ $data->quantity }}</td>
                <td>{{ $data->product->price }}</td>
                <td>{{ $data->payment_status }}</td>
                <td>{{ $data->delivery_status }}</td>
                <td ><img style="height: 60px; width:60px;"  src="/product/{{ $data->product->image }}" alt="" class="rounded mx-auto d-block"></td>
                <td>
                    @if($data->delivery_status=='processing')
                  <a onclick="return confirm(' are sure you want to cancel the order')"
                  href="{{ url('cancel_order',$data->id) }}"class="btn btn-danger">cancel Order</a>
                  @else
                  <p style="color: blue ">not allowed</p>
                  @endif
                </td>
              </tr>
              @empty
               <td colspan="100">
                <h1 style="text-align: center;" class="alert alert-danger">  No Data Found </h1>
              </td>
              @endforelse
            </tbody>
           
          </table>
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