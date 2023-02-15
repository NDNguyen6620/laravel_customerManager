@extends('master')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{route('customers.create')}}">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>image</th>
                        <th>gender</th>
                        <th>province</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $data)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td><img src="{{url('uploads')}}/{{$data->image}}" alt="" width="100px"></td>
                        <td>{{$data->gender ? 'female' : 'male'}}</td>
                        <td>{{$data->province->name}}</td>
                        <td><a class="btn btn-primary" href="{{route('customers.edit',$data)}}">Edit</a>
                            
                        </td>
                        <td>
                            <form action="{{route('customers.destroy',$data)}}" method="POST">
                                @method('DELETE')
                                @csrf 
                                <button type="submit" class="btn btn-danger">  DELETE </button>
                            </form>
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$customer -> links()}}
        </div>
        
    </div>
    

@stop