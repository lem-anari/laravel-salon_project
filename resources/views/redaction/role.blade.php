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
        <form action="role" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1>Add role</h1>
            <table>     
            <tr><td>Name, E-mail, Role</td><td>New Role</td>
            </tr>
            
            <tr>
            <td><select name="usr">
            @foreach($users as $user)
                <option>{{$user->id}} . {{$user->name}} {{$user->email}} role: {{$user->role_}}</option>
            @endforeach
            </select></td>
            <td><select name="role">
                <option>choose</option>
                <option>1 admin</option>
                <option>2 client</option>
                <option >3 staff</option>
            </select></td></tr>

            <tr>
            <td><select name="stff">
            <option>choose staff name</option>
            @foreach($staff as $st)
                <option>{{$st->id}} . {{$st->first_name}} {{$st->last_name}}</option>
            @endforeach
            </select></td>
            </tr>
           
           </table>     
            <br>
            <input type="submit" value="Save">
        </form>
	</div>
	
@endsection