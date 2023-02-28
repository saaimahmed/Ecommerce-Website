@extends('front.master')
@section('title')
    Order Page
@endsection
@section('body')
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>Order Information</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card card-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr class="text-danger text-center">
                                    <th>#</th>
                                    <th>Product Title</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Product Image</th>
                                    <th>Payment Status</th>
                                    <th>Delivery status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="text-dark font-weight-bolder">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->title }}</td>
                                    <td>{{ $order->product_quality }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                        <img src="{{ asset( $order->image) }}" alt="" style="height: 100px; width: 100px">
                                    </td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        @if($order->delivery_status == 'Processing')
                                            <a href="{{ route('cancel-order',['id' => $order->id]) }}" class="btn btn-danger" onclick=" return confirm('Are you Sure delete this Order')" >Cancel Order</a>

                                        @else
                                            <p class="text-center text-success">Not Allowed</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
