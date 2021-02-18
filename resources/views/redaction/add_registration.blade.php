@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        <form action="add_registration" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        
        <select name="client">
        @foreach($clients as $client)
            <option>{{$client->id}} {{$client->first_name}} {{$client->last_name}} </option>
        @endforeach
        </select>
        <select name="service">
        @foreach($services as $service)
            <option> {{$service->id}} {{$service->name_of_service }} </option>
        @endforeach
        </select>
        <input type="submit" value="next">
        
	</div>
	
@endsection