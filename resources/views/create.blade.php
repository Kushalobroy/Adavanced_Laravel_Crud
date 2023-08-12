
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layouts.app')

@section('content')
<div class="row">
<div class="col">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center><h2>Create Category</h2></center>
                <div class="card-body">
                    @if(Session::has('category_add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('category_add') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{route('createCategory')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control " placeholder="Category">
                            </div>
                            <div class="form-group">
                                <strong>Parent Category</strong>
                                <select name="parent_id" id="" class="form-control">
                                    <option value="NA" selected>Select</option>
                                    <option value="Food">Food</option>
                                    <option value="Device">Device</option>
                                    <option value="Vehicle">Vehicle</option>
                                    <option value="Human">Human</option>
                                    <option value="Animal">Animal</option>
                                    <option value="Home">Home</option>
                                    <option value="College">College</option>
                                </select>
                            </div>
                            
                        </div>
                        <br><div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-sm-8 bg-light p-3 border">

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <center><h3>Available Category</h3></center>
                <div class="card-body">
                    @if(Session::has('delete_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('delete_message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-striped">
                      
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Parent Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->parent_id}} </td>
                                <td> <a href="{{route('deleteCategory',[$data->id])}} "><button type="button" class="btn btn-danger">Delete</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
