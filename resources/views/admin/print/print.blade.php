<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Pdf</title>
</head>
<body>
              <h1 class="text-center">order details ID Number {{ $orders->id }}</h1>
              <br />

               <h3 class="text-center">Customer Id : {{$orders->user_id}} </h3>
               <h3 class="text-center">Customer Name : {{$orders->name}} </h3>
               <h3 class="text-center">Customer Email : {{$orders->email}} </h3>
               <h3 class="text-center">Customer Phone : {{$orders->phone}} </h3>
               <h3 class="text-center">Customer Address : {{$orders->address}} </h3>
                <hr>
               <h3 class="text-center">Product ID : {{$orders->product_id}} </h3>
               <h3 class="text-center">Product Name : {{$orders->title}} </h3>
               <h3 class="text-center">Product Price : {{$orders->price}} </h3>
               <h3 class="text-center">Product Quantity : {{$orders->product_quality}} </h3>
              <hr>
              <h3 class="text-center">Payment Status : {{$orders->payment_status}} </h3>
              <img src="{{ asset( $orders->image)  }}" alt="" style="height: 100px; width: 100px;">




</body>
</html>
