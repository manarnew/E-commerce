<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Order Details</h1>
    Customer Name :<h3>{{ $Order->name }}</h3>
    Customer Email :<h3>{{ $Order->email }}</h3>
    Customer Phone :<h3>{{ $Order->phone }}</h3>
    Customer Address :<h3>{{ $Order->address }}</h3>


    Product Title :<h3>{{ $Order->product_title }}</h3>
    Product Quantity :<h3>{{ $Order->quantity }}</h3>
    Product Price :<h3>{{ $Order->price }}</h3>
    Payment Status :<h3>{{ $Order->payment_status }}</h3>
    Delivery Status :<h3>{{ $Order->delivery_status }}</h3>
    <img style="height:250px; width:450px;"  src="product/{{ $Order->image }}" alt="" class="rounded mx-auto d-block">
</body>
</html>