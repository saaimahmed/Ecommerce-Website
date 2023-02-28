@extends('admin.master')
@section('title')
    Home Page
@endsection

@section('body')
    <main id="main" class="main">

        <section class="py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary ">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure?')">
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


