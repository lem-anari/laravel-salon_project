@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        <form action="save_registration" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        Client <input type="text" name="client" value="{{$client}}">
        Service <input type="text" name="service" value="{{$service}}">
        Schedule <input type="text" name="schedule" value="{{$schedule_id}} {{$staff}} {{$days}}">
        Time <input type="text" name="time" value="{{old('time')}}"><br>
      
        <input type="submit" value="next">
        </form>
	</div>
	
@endsection