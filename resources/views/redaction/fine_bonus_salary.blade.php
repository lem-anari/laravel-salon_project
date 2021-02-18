@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <form action="salary" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Fine, Bonus</h1><br>

            <select name="staff">
            @foreach ($staff as $st)            
                <option >{{$st->id}}.   {{$st->first_name}} {{$st->last_name}}</option>
            @endforeach
            </select>
            <p>fine</p>
            <select name="fine">
            <option>choose</option>
            @foreach ($fines as $fine)            
                <option >{{$fine->id_fine}}.  {{$fine->amount}}</option>
            @endforeach
            </select>
            <p>bonus</p>
            <select name="bonus">
            <option>choose</option>
            @foreach ($bonuses as $bonus)            
                <option >{{$bonus->id_bonus}}.  {{$bonus->amount}}</option>
            @endforeach
            </select><br>
            
            <input type="submit" value="Save">
            
        </form>
	</div>
	
@endsection