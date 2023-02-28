@extends('front.master')

@section('title')
   Product details Page
@endsection

@section('body')
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products Details</span>
                </h2>
            </div>
            <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-10 mx-auto ">
                        <div class="box">
                            <div class="option_container ">
                                <div class="options">
                                    <a href="{{ route('product-details',['id' => $product->id]) }}" class="option1">
                                        Product Details
                                    </a>
                                    <form action="">
                                        <a href="" class="option2">Buy Now</a>
                                    </form>

                                    <form action="{{ route('add-cart',['id' => $product->id]) }}" method="post" class="text-center" >

                                        @csrf
                                        <input  type="submit" class="option1" value="Add to Cart">

                                        <div class="col-md-6 mx-auto mt-2">

                                            <input type="number" class="option1" name="quantity" value="1" min="1">
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="img-box">
                                <img src="{{asset( $product->image)}}" alt="" style="width: 300px ;height: 400px;">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->title }}
                                </h5>

                                @if($product->discount_price!=null)
                                    <h6 style="color: red">
                                        Discount price:
                                        <br>
                                        ${{ $product->discount_price }}
                                    </h6>

                                    <h6 style="color: blue">
                                        price:
                                        <br>
                                        <p style="text-decoration: line-through;">
                                            ${{ $product->price }}
                                        </p>
                                    </h6>
                                @else
                                    <h6 style="color: green">
                                        price:
                                        <br>
                                        <p>${{ $product->price }}</p>
                                    </h6>
                                @endif

                            </div>
                        </div>
                    </div>


            </div>

            <div class="btn-box">
                <a href="{{route('product')}}">
                    View All products
                </a>
            </div>
        </div>
    </section>
@endsection

