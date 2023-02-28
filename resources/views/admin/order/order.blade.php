@extends('admin.master')
@section('title')
    Order Page
@endsection

@section('body')
    <main id="main" class="main">
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">All Order</h1>
                        <table class="table table-bordered table-responsive table-danger" id="datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product Title</th>
                                <th>Product Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Image</th>
                                <th>Delivered</th>
                                <th>Print PDF</th>
                                <th>Send Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->title }}</td>
                                    <td>{{ $order->product_quality }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        <img src="{{ asset( $order->image) }}" alt="" style="height: 100px; width: 90px">
                                    </td>
                                    <td>
                                        @if($order->delivery_status == 'Processing')
                                            <a href="{{ route('change-delivered-status',['id' => $order->id]) }}" class="btn btn-outline-danger">Delivered</a>
                                        @else
                                            <p class="text-success">Delivered</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('print_pdf',['id' => $order->id]) }}" class="btn btn-success">Print PDF</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('send_email',['id' => $order->id ]) }}" class="btn btn-danger">Send Email</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </section>
    </main><!-- End #main -->
@endsection




