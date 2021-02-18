@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <form action="up_salary" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Up salary</h1><br>
            <p>Choose service to add the salary to staff</p>
            <select name="service">
            @foreach ($services as $service)            
                <option >{{$service->id}} .  {{$service->name_of_service}}</option>
            @endforeach
            </select><br>
            
            <input type="submit" value="Save">
            
        </form>
	</div>
	
@endsection