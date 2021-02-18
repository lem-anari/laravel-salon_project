@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to our site</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
            </div>
            {{session(['username' => \Auth::user()->name])}}
            <a href="{{route('main')}}"><button type="button" class="btn btn-outline-info" id="button_welcome" >Start</button></a>
            <!-- {{config('database[pgsql].username', $_SERVER['DB_USERNAME'])}}
            {{}} -->
        </div>
    </div>
</div>
@endsection
