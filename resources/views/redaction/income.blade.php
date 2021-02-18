@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    <h1>Average monthly income</h1><br>
    <form>
        @foreach($show_inc as $show)
        <input type="text"  value="{{$show['month']}} month - {{round($show['Current month'], 2)}} "><br>
        @endforeach
    </form>
	</div>
	
@endsection