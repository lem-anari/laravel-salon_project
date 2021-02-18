@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        <form action="add_registration__" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <select name='days'>
        @foreach($real_days as $days)
            <option> {{$days}}</option>
        @endforeach
        </select><br>
        <input type="hidden" name = "client" value="{{$client}}">
        <input type="hidden" name = "service" value="{{$service}}">
        <input type="hidden" name = "staff" value="{{$staff}}">
        <input type="submit" value="next">
        </form>
	</div>
	
@endsection