@extends('admin.master')
@section('title')
   Create Product Page
@endsection

@section('body')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <h4 class="text-center ">Add Product</h4>
                        <span class="text-center text-success">{{Session::has('message')? Session::get('message'): ''}}</span>
                        <div class="card-body">
                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" />
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Product Category</label>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" selected><-- Select a Option --></option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Product Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control" placeholder="Write a title">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" id="" cols="5" rows="5"class="form-control" placeholder="Write a description" ></textarea>
                                    </div>
                                </div>
                               <div class="row mt-3">
                                <label for="" class="col-md-3">Product Price</label>
                                <div class="col-md-9">
                                    <input type="text" name="price" class="form-control" placeholder="Write a price">
                                </div>
                              </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Discount Price</label>
                                    <div class="col-md-9">
                                        <input type="text" name="discount_price" class="form-control" placeholder="Write a discount price">
                                    </div>
                                  </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Product Quantity</label>
                                    <div class="col-md-9">
                                        <input type="text" name="product_quality" class="form-control" placeholder="Write a product Quantity">
                                    </div>
                                  </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3">Product Image </label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control" placeholder="upload a product image">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  value="Submit Add Product" class="btn btn-outline-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </section>

    </main><!-- End #main -->
@endsection



