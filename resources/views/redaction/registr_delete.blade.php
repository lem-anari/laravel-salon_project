@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
        <h1>Registrations</h1><br>
        <form action="" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <table>     
            <tr><td>Client</td><td>Service</td><td>Date</td><td>Time</td>
            </tr>               
            @foreach($registrations as $registration)
            <tr><td> <input type="text" name="client" value="{{$registration['first_name']}} {{$registration['last_name']}}"></td>
            <td> <input type="text" name="service" value="{{$registration['name_of_service']}}"></td>
            <td> <input type="text" name="time" value="{{$registration['date_']}}"></td>
            <td> <input type="text" name="schedule" value="{{$registration['time_']}}"></td>
            <td><input type="hidden"  name="id" value="{{$registration['id']}}"></td>
            <td><button type="submit" class="btn btn-outline-danger">Delete</button></td></tr>
            
            @endforeach
            </table>
        </form>
	</div>
	
@endsection