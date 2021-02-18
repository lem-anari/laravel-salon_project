@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    <h1>Highest employee income</h1><br>
    <form>
        @foreach($show_inc as $show)
        <input type="text"  value="{{$show['first_name']}} {{$show['last_name']}} {{str_replace('?','',$show['Доход'])}}"><br>
        @endforeach
    </form>
	</div>
	
@endsection