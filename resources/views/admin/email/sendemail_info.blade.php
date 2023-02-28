@extends('admin.master')
@section('title')
    Send Email information
@endsection

@section('body')
    <main id="main" class="main">
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h1 class="text-center">Send Email To {{ $order->email }}</h1>
                            <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <form action="{{ route('send_user_email',['id' => $order->id]) }}" method="post">
                                            @csrf
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email Greeting</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="greeting" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email First Line :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="firstline" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email Body :</label>
                                                <div class="col-md-8">
                                                    <textarea name="body" id="" cols="30" rows="5" class="form-control"></textarea>

                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email Button Name :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="button" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email Url:</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="url" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3">Email Last Line :</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="lastline" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label for="" class="col-md-3"></label>
                                                <div class="col-md-8">
                                                    <input type="submit" value="Send Email"  class="btn btn-info form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection





