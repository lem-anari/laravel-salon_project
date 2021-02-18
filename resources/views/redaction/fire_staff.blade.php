@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
    <h1>Fire staff</h1><br>
    <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $staff as $st)
                    <tr>
                        <th scope="row">{{$st->first_name}}</th>
                        <td>{{$st->last_name}}</td>
                        <td>
                            <form action="" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <input type="hidden" name="id" value="{{$st->id}}">
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        <!-- <form action="fire_staff" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <h1>Fire staff</h1><br>
            <input type="text" placeholder="first name" name="first_name" value="{{old('first_name')}}"><br>
            <input type="text" placeholder="last name" name="last_name" value="{{old('last_name')}}"><br>
            <input type="submit" value="Fire">
        </form> -->
	</div>
	
@endsection