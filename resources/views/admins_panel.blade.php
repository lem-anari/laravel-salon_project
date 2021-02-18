@extends('layout')
@section('title', 'admin panel')
@section ('content')
    
	<div class="inner">
		<header>
			<h1><a href="#clients" ><button type="button" class="btn btn-primary btn-lg">Clients</button></a></h1>
			<h1><a href="#registrations" ><button type="button" class="btn btn-primary btn-lg" >Registrations</button></a></h1>
			<h1><a href="#services" ><button type="button" class="btn btn-primary btn-lg">Services</button></a></h1>
			<h1><a href="#staff" ><button type="button" class="btn btn-primary btn-lg">Staff</button></a></h1>
			<h1><a href="#schedule" ><button type="button" class="btn btn-primary btn-lg">Schedule</button></a></h1>
			<h1><a href="#work_day" ><button type="button" class="btn btn-primary btn-lg">Work day</button></a></h1>
			<h1><a href="#income" ><button type="button" class="btn btn-primary btn-lg">Average monthly income</button></a></h1>
			<h1><a href="#staff_income" ><button type="button" class="btn btn-primary btn-lg">Highest employee income</button></a></h1>
		</header>
	</div>
	<section id="clients">
		<header>
			<br><h2>Clients</h2>
			<h2><a href="{{route('add_client')}}"><button >add client</button></a>
			<a href="{{route('add_registration')}}" ><button>make an appointment</button></a></h2>
			
			<hr />
		</header> 
	</section>
	<section id="registrations">
		<header>
			<br><h2>Registrations</h2>
			<h2><a href="{{route('add_registration')}}"><button>add</button></a>
			<a href="{{route('view_registrations')}}" ><button>view</button></a>
			<a href="{{route('delete_reg')}}" ><button>delete</button></a></h2>
			<hr />
		</header> 
	</section>
	<section id="services">
		<header>
			<br><h2>Services</h2>
			<h2><a href="{{route('add_service')}}" ><button>add service</button></a></h2>
			<hr />
		</header> 
	</section>
	<section id="staff">
		<header>
			<br><h2>Staff</h2>
			<h2><a href="{{route('add_staff')}}" ><button>add new staff</button></a>
			<a href="{{route('fire_staff')}}" ><button>fire staff</button></a>
			<a href="{{route('salary')}}" ><button>fine/bonus</button></a>
			<a href="{{route('role')}}" ><button>add role</button></a>
			<a href="{{route('up_salary')}}" ><button>up salary</button></a></h2>
			<hr />
		</header> 
	</section>
	<section id="schedule">
		<header>
			<br><h2>Schedule</h2>
			<h2><a href="{{route('add_schedule')}}" ><button>add new</button></a>
			</h2>
			<hr />
		</header> 
	</section>
	<section id="work_day">
		<header>
			<br><h2>Work day</h2>
			<h2><a href="{{route('add_work_day')}}" ><button>add new</button></a>
			</h2>
			<hr />
		</header> 
	</section>average monthly income
	<section id="income">
		<header>
			<br><h2>Average monthly income</h2>
			<h2><a href="{{route('income')}}" ><button>show</button></a>
			</h2>
			<hr />
		</header> 
	</section>
	<section id="staff_income">
		<header>
			<br><h2>Highest employee income</h2>
			<h2><a href="{{route('staff_income')}}" ><button>show</button></a>
			</h2>
			<hr />
		</header> 
	</section>
@endsection