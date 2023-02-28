@extends('front.master')

@section('title')
    Cart Page
@endsection

@section('body')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="full">
                        <h3>CART Information</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-10 mx-auto">
                    <h4 class="text-danger text-center">{{ Session::has('message') ? Session::get('message'): '' }}</h4>
                    <br />
                    <table class="table align-content-center table-bordered ">
                        <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Product Title</th>
                            <th>Product Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center font-weight-bolder">

                        <?php $totalprice=0; ?>

                        @foreach($carts as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->title }}</td>
                            <td>{{ $cart->product_quality }}</td>
                            <td class="text-danger">{{ $cart->price }}</td>
                            <td>
                                <img src="{{ asset(  $cart->image)}}" alt="image" style="height: 100px ; width: 100px;">
                            </td>
                            <td>
                                <form action="{{route('remove-cart',['id' => $cart->id])}}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Remove">
                                </form>
                            </td>
                        </tr>
{{--                       how to total price showing total price showing--}}

<!--                            --><?php $totalprice = $totalprice + $cart->price  ?>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-2">
                        <h4 class="text-center text-danger">Total Price : {{ $totalprice }}</h4>
                    </div>
                    <div class="py-5 text-center">
                        <h2 class="text-center text-danger italic">Proceed to order</h2>
                        <a href="{{ route('cash_order') }}" class="text-center btn btn-danger text-white font-weight-bolder">Cash on Delivery</a>
                        <a href="{{ route('stripe',$totalprice) }}" class="text-center btn btn-danger text-white font-weight-bolder">Pay Using card</a>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
