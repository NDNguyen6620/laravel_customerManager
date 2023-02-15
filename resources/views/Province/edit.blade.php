@extends('master')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <form method="POST" action="{{route('provinces.update',$province)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Province</label>
                    <input type="text" class="form-control" name="name" value="{{$province->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        
    </div>
    

@stop