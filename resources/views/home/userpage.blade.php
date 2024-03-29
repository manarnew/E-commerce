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
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
      @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
@include('home.product')     
</div>

</section>

      <!-- end product section -->
      <!-- comment and reply system start here -->

      <div style=" text-align:center;paddding-bottom: 30px;">
         <h1 style="font-size: 30px; text-align:center;paddding-top:20px">Comments</h1>
         <form action="{{ url('add_comment') }}" method="post">
            @csrf
            <textarea style="height:50px;width:600px;"
            placeholder="Comment something here" name="comment"></textarea>
           <br>
           <input type="submit"class="btn btn-primary" value="Comment">
           @error('comment')
           <span class="text-danger">{{ $message }}</span>
         @enderror
         </form>
      </div>
      <br>
      <div style="padding-left: 20%">
          <h1 style="font-size: 20px;padding-bottom:20px;">All Comments</h1>
          @foreach ($comment as $comment)
          <div>
            <b>{{ $comment->user->name }}</b>
            <p>{{ $comment->comment }}</p>

            <a href="javascript::void(0)" onclick="reply(this)"
            data-Commentid="{{ $comment->id }}"> Reply </a>
           
            @foreach ($Reply as $rep)
            <div style="padding-left: 3%;padding-bottom:10px;">
               @if ($rep->comment_id==$comment->id)
               <b>{{ $rep->user->name }}</b>
               <p>{{ $rep->reply }}</p>
               <a href="javascript::void(0)" onclick="reply(this)"
                data-Commentid="{{ $comment->id }}"> Reply </a>
               @endif
            </div>
            @endforeach
           
          </div>
          @endforeach
        </div>
          <div style="display: none" class="replyDiv">
            <form action="{{ url('add_reply') }}" method="post">
               @csrf
            <input type="hidden"id="commentId" name="commentId">
            <textarea style="height:100px;width:500px;"
            placeholder="Comment something here"name="reply"></textarea>
           <br>
           <button type="submit"class="btn btn-primary">Reply</button>
            <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">
               Close
            </a>
         </form>
          </div>
         </div>
      <!-- comment and reply system end here -->
      <!-- subscribe section -->
     @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
     @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
     

      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="#"> Manar Omer</a><br>
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