@extends('layout')
@section('title', 'Service')
@section ('content')


<div class="inner">
        <h1>Add registration</h1><br>
		
	</div>
<div class="reel">
	<article>
		<header>
			<h3><a href="#">{{$service->name_of_service}}</a></h3>
			<a href="" class="image featured"><img src="{{asset($service->image)}}"></a>
		</header><br>
		<form action="single_post" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<select name="staff">
        @foreach($staff_names as $staff)
            <option>{{$staff['id']}} {{$staff['first_name']}} {{$staff['last_name']}} </option>
        @endforeach
        </select><br>
		<input type="hidden" name = "service_id" value="{{$service->id}}">
        <input type="hidden" name = "client_id" value="{{$client_id}}">
		<input type="hidden" name = "price" value="{{$service->price}}">
		<input type="submit" value="next"><br>
        </form>
		
	</article>
</div>
<!--  -->
@endsection
