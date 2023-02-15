@extends('master')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{route('provinces.create')}}">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($province as $data)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td><a class="btn btn-primary" href="{{route('provinces.edit',$data)}}">Edit</a>
                            
                        </td>
                        <td>
                            <form action="{{route('provinces.destroy',$data)}}" method="POST">
                                @method('DELETE')
                                @csrf 
                                <button type="submit" class="btn btn-danger">  DELETE </button>
                            </form>
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    

@stop