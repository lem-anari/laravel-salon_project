@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    
        <form action="add_schedule" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Add schedule</h1><br>
            
            <select name="staff">
            @foreach ($staff as $st)            
                <option >{{$st->id}}.   {{$st->first_name}} {{$st->last_name}}</option>
            @endforeach
            </select><br>

            <select name="work_day">
            @foreach ($work_days as $day)            
                <option >{{$day->id}} .   {{$day->date_}}  {{$day->time_}} - {{$day->time_end}}</option>
            @endforeach
            </select><br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection