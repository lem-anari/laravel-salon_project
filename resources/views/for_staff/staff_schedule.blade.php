@extends('layout')
@section('title', 'staff panel')
@section ('content')
    
	<div class="inner">
    
        <form action="" method="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Schedule</h1>
            <br>
            @foreach($schedule as $sch)
                <input type="text" value="{{$sch['date_']}}       {{$sch['time_']}} - {{$sch['time_end']}}">
            @endforeach
        </form>
	</div>
	
@endsection