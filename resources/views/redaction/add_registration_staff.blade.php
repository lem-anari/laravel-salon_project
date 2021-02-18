@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        <form action="add_registration_" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <select name="staff">
        @foreach($staff_names as $staff)
            <option>{{$staff['id']}} {{$staff['first_name']}} {{$staff['last_name']}} </option>
        @endforeach
        </select><br>
        <input type="hidden" name = "service" value="{{$service}}">
        <input type="hidden" name = "client" value="{{$client}}">
        <input type="submit" value="next">
        </form>
	</div>
	
@endsection