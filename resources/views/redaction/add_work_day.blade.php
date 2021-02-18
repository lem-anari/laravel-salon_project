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
            
            <br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection