@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="add_service" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Add service</h1>
            <input type="text" placeholder="name of service" name="name_of_service" value="{{old('name_of_service')}}"><br>
            <input type="text" placeholder="price" name="price" value="{{old('price')}}"><br>
            <input type="text" placeholder="duration" name="duration" value="{{old('duration')}}"><br>
            <input type="file" placeholder="image" name="image" value="{{old('image')}}"><br>
            <select name="position_of_staffs">
            @foreach ($position_of_staffs as $position)            
                <option >{{$position->pos_id}}  {{$position->name_of_pos}}</option>
            @endforeach
            
            </select>

            <br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection