@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="add_work_day" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Add Work Days</h1><br>
            <input type="text" placeholder="date" name="date" value="{{old('date')}}"><br>
            <input type="text" placeholder="time begin" name="time_" value="{{old('time_')}}"><br>
            <input type="text" placeholder="time end" name="time_end" value="{{old('time_end')}}"><br>
           
            <br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection