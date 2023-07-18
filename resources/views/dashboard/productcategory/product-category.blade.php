@extends('layouts.dashboard-layout')

@section('my-content')
<div class="container">
    <div class="row">
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Product Category</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)

                    <tr>
                        <th>{{$item->CategoryId}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td><img src="{{ asset($item->img) }}" width="80" alt=""></td>
                        <td>
                            <a class="btn btn-primary" href="{{url('dashboard/edit-product-category')}}/{{$item->CategoryId}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('dashboard/delete-product-category')}}/{{$item->CategoryId}}">Delte</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
