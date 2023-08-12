
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <center> <h1>Update Product</h1></center>
                    <form action="{{route('updateProducts',$data->id)}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <strong>Category</strong>
                                <select name="category_id" id="" class="form-control">
                                    <option value="NA" selected>Select</option>
                                    @foreach ($da as $da)
                                        <option value="{{$da->id}}">{{$da->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
