
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if(Session::has('delete_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete_message') }}
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('product_add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('product_add') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('update_message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('update_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <a href="{{ url('/create') }}"><button type="button" class="btn btn-primary">Create Category </button></a>
                    &nbsp;<a href="{{ url('/createProduct') }}"><button type="button" class="btn btn-primary">Create Product </button></a>
                    <table class="table table-striped">
                      
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Parent Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->category->name}} </td>
                                <td>{{$data->category->parent_id}} </td>
                                <td class="text-center"><a href="{{route('updateProduct',[$data->id])}} "><button type="button" class="btn btn-warning">Update</button></a>
                                    &nbsp; <a href="{{route('delete',[$data->id])}} "><button type="button" class="btn btn-danger">Delete</button></a>
                                    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
