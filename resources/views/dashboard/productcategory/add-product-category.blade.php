@extends('layouts.dashboard-layout')


@section('my-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
            <div class="card">
        <h5 class="card-header">Add Product Category</h5>
        <div class="card-body">
            <form action="{{url('dashboard/store-product-category')}}"enctype="multipart/form-data" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label>Enter Category Name</label>
                        <input type="text" class="form-control" placeholder="First name" name="name" value="{{old('name')}}">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <label>Enter Category Description</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <label>Enter Category Description</label>
                        <input type="file" class="form-control" name="img">
                        @error('img')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-4 ml-4">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>
@endsection
