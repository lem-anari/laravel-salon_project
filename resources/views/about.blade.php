@extends('layout')
@section('title', 'About')
@section ('content')

<div class="inner">
		<header>
			<h1><a href="#" id="logo">About</a></h1>
			<hr />
			<p></p>
		</header>
		<footer>
			<a href="#banner" class="button circled scrolly">Read</a>
		</footer>
	</div>
			<!-- Main -->
            <div class="wrapper style1" id="banner">

<div class="container">
    <article id="main" class="special">
        <header>
            <h2><a href="#">Our workspace</a></h2>
            <p class="text_color">
                Morbi convallis lectus malesuada sed fermentum dolore amet
            </p>
        </header>
        <a href="#" class="image "><img src="images/about2.jpg" alt="" /></a>
        <p class="text_color">
            Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
            posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
            lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
            consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
            interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
            natoque aenean scelerisque vel lacinia mollis quam sodales congue.
        </p>
        <section>
            @if(\Auth::check())
            <header>
                <h3>List of employees ranked by the demand for their services</h3>
            </header>
                @foreach($employees_ranked as $employee)
                    <ul>
                        <li class="text_color">{{$employee['first_name']}} {{$employee['last_name']}}</li>
                    </ul>
                @endforeach
            @endif
            <p class="text_color">
                Eleifend auctor turpis magnis sed porta nisl pretium. Aenean suspendisse nulla eget sed etiam parturient
                orci cursus nibh. Quisque eu nec neque felis laoreet diam morbi egestas. Dignissim cras rutrum consectetur
                ut penatibus fermentum nibh erat malesuada varius.
            </p>
        </section>
        <section>
            @if(\Auth::check())
            <header>
                <h3>Clients who have used most of the services</h3>
            </header>
                @foreach($all_services_clients as $clients)
                    <ul>
                        <li class="text_color">{{$clients['first_name']}} {{$clients['last_name']}}</li>
                    </ul>
                @endforeach
            @endif
            <p class="text_color">
                Pretium tellus in euismod a integer sodales neque. Nibh quis dui quis mattis eget imperdiet venenatis
                feugiat. Neque primis ligula cum erat aenean tristique luctus risus ipsum praesent iaculis. Fermentum elit
                ut nunc urna volutpat donec cubilia commodo risus morbi. Lobortis vestibulum velit malesuada ante
                egestas odio nisl duis sociis purus faucibus morbi. Eget massa mus etiam sociis pharetra magna.
            </p>
        </section>
    </article>
</div>

</div>

<!-- Footer -->
@section ('footer')
    
            @endsection
@endsection