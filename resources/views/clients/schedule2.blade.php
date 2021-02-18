@extends('layout')
@section('title', 'Service')
@section ('content')


<div class="inner">
        <h1>Add registration</h1><br>
        <form action="/public/clients/schedule2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name = "client_id" value="{{$client_id}}">
        <input type="hidden" name = "service_id" value="{{$service_id}}">
        <input type="hidden" name = "staff_id" value="{{$staff_id}}">
         <input type="hidden" name="schedule_id" value="{{$schedule_id}}">
         <input type="hidden" name = "price" value="{{$price}}">
        Time <input type="text" name="time" value="{{old('time')}}"><br>
        <input type="submit" value="next">
        </form>
	</div>
@endsection
