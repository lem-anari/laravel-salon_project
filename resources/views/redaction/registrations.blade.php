@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        @foreach($registrations as $registration)
        <label>Client <input type="text" name="client" value="{{$registration['first_name']}} {{$registration['last_name']}}"></label>
        <label>Service <input type="text" name="service" value="{{$registration['name_of_service']}}"></label>
        <label>Time <input type="text" name="time" value="{{$registration['date_']}}"></label>
        <label>Schedule <input type="text" name="schedule" value="{{$registration['time_']}}"></label><br>
        @endforeach
	</div>
	
@endsection