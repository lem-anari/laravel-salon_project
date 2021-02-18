@extends('layout')
@section('title', 'Heliot-home')
@section ('content')


	<!-- Inner -->
	<div class="inner">
		<header>
		
			<h1><a href="index.html" id="logo">Heliot</a></h1>
			<hr />
			<p>“You will not have a second chance to make a first impression.”</p>
		</header>
		<footer>
			<a href="#banner" class="button circled scrolly">Start</a>
		</footer>
	</div>
    <!-- Banner -->
    <section id="banner">
		<header>
		
	
			<h2>Hi. You're looking at <strong>Heliot </strong>.</h2>
			
		</header> 
	</section>


<!-- Carousel -->
	<section class="carousel">
		<div class="reel">
		@foreach ($services as $service)
			<article>
				<a href="#" class="image featured"><img src="{{asset($service->image)}}" alt="" /></a>
				<header>
					<h3><a href="#">{{$service->name_of_service}}</a></h3>
				</header>
				<br>
				@if (! \Auth::check ())
					<a href="{{route('login')}}"><button>Sign up</button></a>
				@else
					<a href="{{route('single_post', $service->id)}}"><button>more</button></a>
				@endif
			</article>
			@endforeach
		</div>
	</section>
<!-- Main -->
	<div class="wrapper style2">
		<article id="main" class="container special">
			<a href="#" class="image featured"><img src="{{asset('images/model.jpg')}}" alt="" /></a>
			<header>
				<h2><a href="#">Sed massa imperdiet magnis</a></h2>
				<p class="text_color">
					Sociis aenean eu aenean mollis mollis facilisis primis ornare penatibus aenean. Cursus ac enim
					pulvinar curabitur morbi convallis. Lectus malesuada sed fermentum dolore amet.
				</p>
			</header>
			<p class="text_color">
				Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
				posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
				sit arcu sociis. Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam
				mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan
				lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
				consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
				interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
				natoque aenean scelerisque.
			</p>
		</article>
	</div>
<!-- Features -->
	<div class="wrapper style1">
		<section id="features" class="container special">
			<header>
				<h2>The most popular services</h2>
				<p>Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
			</header>
			<div class="row">
			@foreach ($popular as $pop)
				<article class="col-4 col-12-mobile special">
					<a href="{{route('single_post', $pop['id'])}}" class="image featured"><img src="{{asset($pop['image'])}}" alt="" /></a>
					<header>
						<h3><a href="{{route('single_post', $pop['id'])}}">
							{{$pop['name_of_service']}}
						</a></h3><br>
						@if (! \Auth::check ())
							<a href="{{route('login')}}"><button>Sign up</button></a>
						@else
						<button><a href="{{route('single_post', $pop['id'])}}">more</a></button>
						@endif
					</header>
				</article>
				@endforeach
			</div>
			
		</section>
	</div>

@endsection