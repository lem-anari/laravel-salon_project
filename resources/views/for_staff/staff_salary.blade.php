@extends('layout')
@section('title', 'staff panel')
@section ('content')
    
	<div class="inner">
    
        <form action="" method="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Salary</h1>
            <br>
            <input type="text" value="{{str_replace('?','', $salary[0]['salary'])}}">
        </form>
	</div>
	
@endsection