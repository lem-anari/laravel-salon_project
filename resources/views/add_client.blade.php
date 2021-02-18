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
        <form action="add_client" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Add client</h1>
            <input type="text" placeholder="first name" name="first_name" value="{{old('first_name')}}"><br>
            <input type="text" placeholder="last name" name="last_name" value="{{old('last_name')}}"><br>
            <input type="text" placeholder="telefone number" name="telefone_number" value="{{old('telefone_number')}}"><br>
            <input type="text" placeholder="number_of_procedurs" name="number_of_procedurs" value="{{old('number_of_procedurs')}}"><br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection