@extends('layout')
@section('title', 'Services')
@section ('content')

<div class="inner">
		<header>
			<h1><a href="#" id="logo">Services</a></h1>
			<hr />
			<p>“Elegance is not to stand out, but to be remembered.”</p>
		</header>
		<footer>
			<a href="#banner" class="button circled scrolly">Get service</a>
		</footer>
	</div>
                <div class="wrapper style1" id="banner">

					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-mobile" id="content">
								<article id="main">
									<header>
										<h2 class="size_h"><a href="#">Get more information about services</a></h2>
										<p class="text_color">
											Morbi convallis lectus malesuada sed fermentum dolore amet
										</p>
									</header>
									<a href="#" class="image featured"><img src="https://cosmo.kz/wp-content/uploads/2019/09/make_up-1.gif" alt="" /></a>
									<!-- Features -->
										<section id="features" class="container special">
											<header>
												<h2>No popular services</h2>
												<p class="text_color">Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
											</header>
											<div class="row">
											@foreach ($no_popular as $no_pop)
												<article class="col-4 col-12-mobile special">
												@if (\Auth::check ())
													<a href="{{route('single_post', $no_pop['id'])}}" class="image featured"><img src="{{asset($no_pop['image'])}}" alt="" /></a>
													<header>
														<h3><a href="{{route('single_post', $no_pop['id'])}}">
															{{$no_pop['name_of_service']}}
														</a></h3><br>
														<button><a href="{{route('single_post', $no_pop['id'])}}">Make an appointment</a></button>
													</header>
												@else
												<a href="{{route('login')}}" class="image featured"><img src="{{asset($no_pop['image'])}}" alt="" /></a>
													<header>
														<h3><a href="{{route('login')}}">
															{{$no_pop['name_of_service']}}
														</a></h3><br>
														<button><a href="{{route('login')}}">Sign Up</a></button>
													</header>
												@endif
												</article>
												@endforeach
											</div>
										</section>
									<!-- Features -->
										<section id="features" class="container special">
											<header><br><br>
												<h2>The most popular services</h2>
												<p class="text_color">Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
											</header>
											<div class="row">
											@foreach ($popular as $pop)
												<article class="col-4 col-12-mobile special">
												@if (\Auth::check ())
													<a href="{{route('single_post', $pop['id'])}}" class="image featured"><img src="{{asset($pop['image'])}}" alt="" /></a>
													<header>
														<h3><a href="{{route('single_post', $pop['id'])}}">
															{{$pop['name_of_service']}}
														</a></h3><br>
														<button><a href="{{route('single_post', $pop['id'])}}">Make an appointment</a></button>
													</header>
												@else
													<a href="{{route('login')}}" class="image featured"><img src="{{asset($pop['image'])}}" alt="" /></a>
													<header>
														<h3><a href="{{route('login')}}">
															{{$pop['name_of_service']}}
														</a></h3><br>
														<button><a href="{{route('login')}}">Sign Up</a></button>
													</header>
												@endif
												</article>
												@endforeach
											</div>
										</section>
									<section>
										<br><br><header>
											<h3>Ultrices tempor sagittis nisl</h3>
										</header>
										<p class="text_color">
											Nascetur volutpat nibh ullamcorper vivamus at purus. Cursus ultrices porttitor sollicitudin imperdiet
											at pretium tellus in euismod a integer sodales neque. Nibh quis dui quis mattis eget imperdiet venenatis
											feugiat. Neque primis ligula cum erat aenean tristique luctus risus ipsum praesent iaculis. Fermentum elit
											fringilla consequat dis arcu. Pellentesque mus tempor vitae pretium sodales porttitor lacus. Phasellus
											egestas odio nisl duis sociis purus faucibus morbi. Eget massa mus etiam sociis pharetra magna.
										</p>
										<p class="text_color">
											Eleifend auctor turpis magnis sed porta nisl pretium. Aenean suspendisse nulla eget sed etiam parturient
											orci cursus nibh. Quisque eu nec neque felis laoreet diam morbi egestas. Dignissim cras rutrum consectetur
											ut penatibus fermentum nibh erat malesuada varius.
										</p>
									</section>
									<section>
										<header>
											<h3>Augue euismod feugiat tempus</h3>
										</header>
										<p class="text_color">
											Pretium tellus in euismod a integer sodales neque. Nibh quis dui quis mattis eget imperdiet venenatis
											feugiat. Neque primis ligula cum erat aenean tristique luctus risus ipsum praesent iaculis. Fermentum elit
											ut nunc urna volutpat donec cubilia commodo risus morbi. Lobortis vestibulum velit malesuada ante
											egestas odio nisl duis sociis purus faucibus morbi. Eget massa mus etiam sociis pharetra magna.
										</p>
									</section>
								</article>
							</div>
							<div class="col-4 col-12-mobile" id="sidebar">
								<hr class="first" />
								<section>
								@if (! \Auth::check ())
									<header>
										<h3><a href="#">Important information</a></h3>
									</header>
									<p class="text_color">
									To register for the service, please register or log in.
									</p>
									<footer>
									<a href="{{route('login')}}"><button>Sign up</button></a>
									</footer>
								@endif	
								</section><br>
								<section>
									<header>
										<h3>Our services</h3>
									</header>
									<p class="text_color">
									</p>
									@foreach ($services as $service)
									<div class="row gtr-50 border">
											<div class="col-4">
											@if (\Auth::check ())
												<a href="{{route('single_post', $service->id)}}" class="image fit"><img src="{{asset($service->image)}}" alt="" /></a>
											@else
												<a href="{{route('login')}}" class="image fit"><img src="{{asset($service->image)}}" alt="" /></a>
											@endif
												
											</div>
											<div class="col-8">
												<h4>{{$service->name_of_service}}</h4>
												<p class="text_color">
												price: {{str_replace('?','',$service->price)}}<br>
												duration: {{$service->duration}}<br>
												@if (\Auth::check ())
													<a href="{{route('single_post', $service->id)}}"><button>more</button></a>
												@else
													<a href="{{route('login')}}"><button>Sign Up</button></a>
												@endif
												</p>
												
											</div>
										</div>
									@endforeach  
									
								</section>
							</div>
						</div>
					</div>

				</div>

			<!-- Footer -->
				@section('footer')
						<div class="row">
							<!-- Tweets -->
							
								<section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon brands fa-twitter circled"><span class="label">Tweets</span></h2>
									</header>
									<ul class="divided">
									@if(\Auth::check())
										@foreach($last3days as $last)
										<li>
											<article class="tweet">
												The {{$last['pos']}}
												{{$last['first_name']}}
												{{$last['last_name']}}
												performed the service {{$services[0]->name_of_service}}
												<span class="timestamp">few days ago</span>
											</article>
										</li>
										@endforeach
									@endif
									</ul>
								</section>
							
							<!-- Posts -->
								<section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon solid fa-file circled"><span class="label">Posts</span></h2>
									</header>
									
								</section>

							<!-- Photos -->
								<section class="col-4 col-12-mobile">
									<header>
										<h2 class="icon solid fa-camera circled"><span class="label">Photos</span></h2>
									</header>
									<div class="row gtr-25">
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_001.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_002.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_003.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_004.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_005.jpg" alt="" /></a>
										</div>
										<div class="col-6">
											<a href="#" class="image fit"><img src="images/services_photo/cut/image_part_006.jpg" alt="" /></a>
										</div>
									</div>
                                </section>
                                </div>
        @endsection
@endsection