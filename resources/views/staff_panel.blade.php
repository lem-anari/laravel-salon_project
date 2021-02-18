@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
		<header>
			
			<h1><a href="#salary" ><button type="button" class="btn btn-primary btn-lg">Salary</button></a></h1>
			<h1><a href="#schedule" ><button type="button" class="btn btn-primary btn-lg">Schedule</button></a></h1>
		</header>
	</div>
	<section id="salary">
		<header>
			<br><h2>Salary</h2>
			<h2>
            <!-- <a href="{{route('add_staff')}}" ><button>add new staff</button></a> -->
			<a href="{{route('staff_salary')}}" ><button>show salary</button></a>
            </h2>
			<hr />
		</header> 
	</section>
    <section id="schedule">
		<header>
			<br><h2>Schedule</h2>
			<h2>
            <!-- <a href="{{route('add_staff')}}" ><button>add new staff</button></a> -->
			<a href="{{route('staff_schedule')}}" ><button>show schedule</button></a>
            </h2>
			<hr />
		</header> 
	</section>
@endsection