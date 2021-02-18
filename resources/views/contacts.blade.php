@extends('layout')
@section('title', 'Contacts')
@section ('content')

<div class="inner">
		<header>
			<h1><a href="#" id="logo">Contacts</a></h1>
			<hr />
			<p></p>
		</header>
		<footer>
			<a href="#banner" class="button circled scrolly">Contact us</a>
		</footer>
	</div>
			<!-- Main -->
            <div class="wrapper style1" id="banner">

<div class="container">
    <article id="main" class="special">
        
        <section>
            <header>
                <h3 class="text_color">Ultrices tempor sagittis nisl</h3>
            </header>
            <p class="text_color">
                Nascetur volutpat nibh ullamcorper vivamus at purus. Cursus ultrices porttitor sollicitudin imperdiet
                at pretium tellus in euismod a integer sodales neque. Nibh quis dui quis mattis eget imperdiet venenatis
                feugiat. Neque primis ligula cum erat aenean tristique luctus risus ipsum praesent iaculis. 
            </p>
            <p class="text_color">
                Eleifend auctor turpis magnis sed porta nisl pretium. Aenean suspendisse nulla eget sed etiam parturient
                orci cursus nibh. Quisque eu nec neque felis laoreet diam morbi egestas. Dignissim cras rutrum consectetur
                ut penatibus fermentum nibh erat malesuada varius.
            </p>
        </section>
        </article>
    <hr />
    <div class="row">
        <article class="col-4 col-12-mobile special">
            <a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
            <header>
                <h3><a href="#">Our work time</a></h3>
            </header>
            <span class="text_color align_text">
            <br> <b> Every day </b> <br>
                from: {{$work_time_from}}<br>
                to: {{$work_time_to}}
            </span>
        </article>
        <article class="col-4 col-12-mobile special">
            <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
            <header>
                <h3><a href="#">Our contacts</a></h3>
            </header>
            <span class="text_color align_text">
            <br> Phone: +380664367987 <br>
            Additional phone: +380953092309<br>
                Email:	bolerozin@gmail.com <br>
                
            </span>
        </article>
        <article class="col-4 col-12-mobile special">
            <a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
            <header>
                <h3><a href="#">Our location</a></h3>
            </header>
            <span class="text_color align_text">
            <br>38 W 31st St, New York, NY 10001
            </span>
            
        </article>
        
        
    </div><hr />
    <header id="location" class="special">
            <h2><a href="#">Location tab</a></h2>
            <a href="#" class="image featured"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d380135.0946382332!2d-74.25986613799748!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z0J3RjNGOLdCZ0L7RgNC6LCDQodCo0JA!5e1!3m2!1sru!2sua!4v1589455147564!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></a>

        </header>
</div>
</div>
@endsection