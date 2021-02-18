<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield ('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('css/main.css')}}"/>
		<link rel="stylesheet" href="{{asset('css/style_detail.css')}}"/>
		<noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}"/></noscript>
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="{{route('main')}}">Home</a></li>
								<li><a href="{{route('services')}}">Services</a></li>
								<li><a href="{{route('about')}}">About</a></li>
								<li><a href="{{route('contacts')}}">Contacts</a></li>
								@if(session('role_panel') == "admins")
									<li><a href="{{route('admins_panel')}}">Admin</a></li>
								@elseif(session('role_panel') == "ourstaff")
									<li><a href="{{route('staff_panel')}}">Staff</a></li>
								@endif
								<li>@if (\Auth::check ()){{\Auth::user()->name}} 
									<ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout 
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                    @else <a href="{{route('login')}}">Sign Up @endif</a></li>
							</ul>
						</nav>
						@yield ('content')
						<div id="footer">
		<div class="container">
			@yield ('footer')
		<hr />
			<div class="row">
				<div class="col-12">
					<!-- Contact -->
						<section class="contact">
							<header>
								<h3>Have any questions?</h3>
							</header>
							<p>You can contact us through social networks.</p>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
								<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
								<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li>
							</ul>
						</section>
					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Heliot. All rights reserved.</li><li>Design: Nastya Pozdnikova</li>
							</ul>
						</div>
				</div>
			</div>
			</div>
				</div>
				</div>
				</div>
		</div>
			<script src="{{asset('js/jquery.min.js')}}"></script>
			<script src="{{asset('js/jquery.dropotron.min.js')}}"></script>
			<script src="{{asset('js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('js/jquery.scrollex.min.js')}}"></script>
			<script src="{{asset('js/browser.min.js')}}"></script>
			<script src="{{asset('js/breakpoints.min.js')}}"></script>
			<script src="{{asset('js/util.js')}}"></script>
			<script src="{{asset('js/main.js')}}"></script>
	</body>
</html>