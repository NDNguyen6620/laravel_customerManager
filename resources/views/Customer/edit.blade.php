@extends('master')
@section('content')
    <div class="container">
        <div class="col-lg-6">
            <form method="POST" action="{{route('customers.update',$customer)}}" enctype= "multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$customer->name}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="file">
                            <img src="{{url('uploads')}}/{{$customer->image}}" alt="" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Province</label>
                            <select class="form-control" name="province_id" id="">
                                @foreach($province as $value)
                                    <option value="{{$value->id}}"{{$value->id == $customer->province_id ? 'select':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">gender</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="" value="0" {{ ($customer->gender=="0")? "checked" : "" }}> male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="" value="1" {{ ($customer->gender=="1")? "checked" : "" }}> female
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>
    

@stop
<div></div>