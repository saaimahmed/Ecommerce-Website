@extends('admin.master')
@section('title')
    Home Page
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
                           <h4 class="text-center ">Add Category</h4>
                           <span class="text-center text-success">{{Session::has('message')? Session::get('message'): ''}}</span>
                           <div class="card-body">
                               <form action="{{ route('categories.store') }}" method="post">
                                   @csrf
                                   <div class="row mt-3">
                                       <label for="" class="col-md-3">Category Name</label>
                                       <div class="col-md-9">
                                           <input type="text" name="category_name" class="form-control">
                                       </div>
                                   </div>
                                   <div class="row mt-3">
                                       <label for="" class="col-md-3"></label>
                                       <div class="col-md-9">
                                           <input type="submit"  value="Submit Category" class="btn btn-outline-success">
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                </div>

        </section>

    </main><!-- End #main -->
@endsection


