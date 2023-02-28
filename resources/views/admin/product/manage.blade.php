@extends('admin.master')
@section('title')
    Home Page
@endsection

@section('body')
    <main id="main" class="main">

        <section class="py-5">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration text-center">
                        <thead class="text-center">
                        <tr>
                            <th>Serial No</th>
                            <th>Product Category Id</th>
                            <th>Product Title</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Discount Price</th>
                            <th>Product Quantity</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{$product->category_id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>{{$product->product_quality}}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="" style="height: 100px; width: 100px;">
                                </td>
                                <td>
                                    <a href="" class="btn btn-{{ $product->status == 1 ? 'primary' : 'secondary' }} ">Show</a>
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success fa fa-edit">Edit</a>

                                    <form action="{{route('products.destroy',$product->id)}}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection



