@extends('layout')
@section('title', 'Service')
@section ('content')


<div class="inner">
        <h1>Add registration</h1><br>
        <form action="/public/clients/schedule" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <select name='days'>
        @foreach($real_days as $days)
            <option> {{$days}}</option>
        @endforeach
        </select><br>
        <input type="hidden" name = "client_id" value="{{$client_id}}">
        <input type="hidden" name = "service_id" value="{{$service_id}}">
        <input type="hidden" name = "staff_id" value="{{$staff_id}}">
        <input type="hidden" name = "price" value="{{$price}}">
        
        <input type="submit" value="next">
        </form>
	</div>
@endsection
