@extends('layouts.dashboard-layout')


@section('my-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5">
            <div class="card">
        <h5 class="card-header">Edit Product Category</h5>
        <div class="card-body">
            <form action="{{url ('dashboard/update-product-category') }}/{{$category->CategoryId}}"enctype="multipart/form-data" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label>Enter Category Name</label>
                        <input type="text" class="form-control" placeholder="First name" name="name" value="{{$category->name}}">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <label>Enter Category Description</label>
                        <textarea class="form-control" name="description" rows="4">{{$category->description}}</textarea>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                        <label>Select Category Image</label>
                        <input type="file" class="form-control" name="img">
                        <input type="hidden" value="{{$category->img}}" class="form-control" name="old_img">
                        <img width="80px" src="{{asset($category->img)}}" alt="">
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
