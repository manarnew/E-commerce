

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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
      @include('home.header')
         <!-- end header section -->
     
      
     
      
      <!-- product section -->
      <section class="product_section layout_padding">
          <div class="container">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button"class="close"
                data-dismiss="alert"aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
        @endif
                <main class="my-8">
                  <div class="container px-6 mx-auto">
                      <div class="flex justify-center my-6">
                          <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                            @if ($message = Session::get('success'))
                                <div class="p-4 mb-3 bg-green-400 rounded">
                                    <p class="text-green-800">{{ $message }}</p>
                                </div>
                            @endif
                              <h3 class="text-3xl text-bold">Cart List</h3>
                            <div class="flex-1">
                              <table class="w-full text-sm lg:text-base" cellspacing="0">
                                <thead>
                                  <tr class="h-12 uppercase">
                                    <th class="hidden md:table-cell"></th>
                                    <th class="text-left">Name</th>
                                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                                      <span class="lg:hidden" title="Quantity">Qtd</span>
                                      <span class="hidden lg:inline">Quantity</span>
                                    </th>
                                    <th class="hidden text-right md:table-cell"> price</th>
                                    <th class="hidden text-right md:table-cell"> Remove </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                  <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                      <a href="#">
                                        <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                      </a>
                                    </td>
                                    <td>
                                      <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                        
                                      </a>
                                    </td>
                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                      <div class="h-10 w-28">
                                        <div class="relative flex flex-row w-full h-8">
                                          
                                          <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}" >
                                          <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                          class="w-6 text-center bg-gray-300" />
                                          <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                          </form>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                      <span class="text-sm font-medium lg:text-base">
                                          ${{ $item->price }}
                                      </span>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                      <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="px-4 py-2 text-white bg-red-600">x</button>
                                    </form>
                                      
                                    </td>
                                  </tr>
                                  @endforeach
                                   
                                </tbody>
                              </table>
                              <div>
                               Total: ${{ Cart::getTotal() }}
                              </div>
                              <div>
                                <form action="{{ route('cart.clear') }}" method="POST">
                                  @csrf
                                  <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                                </form>
                              </div>
      
                              <div style="text-align: center;padding-top:20px;padding-bottom:20px">
                                <h1 style="font-size:27px;padding-bottom:20px; color:blue">Proceed to Order</h1>
                                <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
                                <a href="" class="btn btn-danger">Pay Uding Card</a>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
              </main>
          </div>
      </section>
     
</div>

</section>

   

     
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
