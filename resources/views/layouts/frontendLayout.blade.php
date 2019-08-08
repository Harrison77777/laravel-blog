<!DOCTYPE HTML>
<html lang="en">
<head>
	<title> @yield('title') </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{asset('blogger-2172746_960_720.png')}}" type="image/x-icon">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	{{--  <link href="{{asset('frontend/css/common-css/bootstrap.css')}}" rel="stylesheet')}}">  --}}
	<link href="{{asset('frontend/css/common-css/swiper.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/common-css/ionicons.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/front-page-category/css/styles.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	<link href="{{asset('frontend/css/front-page-category/css/responsive.css')}}" rel="stylesheet">
	@stack('css')
</head>
<body>
	<header>
		<div class="container-fluid position-relative no-side-padding">
			<a href="#" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt="Logo Image"></a>
			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="{{route('home.page')}}">Home</a></li>
				<li><a href="{{route('all.post')}}">Post</a></li>
				@guest
				<li><a href="{{route('login')}}">Login</a></li>
				<li><a href="{{route('register')}}">Register</a></li>
				@endguest
				@auth
				<li>
					<a 
					onclick=
					"
					event.preventDefault();
					document.getElementById('logoutForm').submit();
					" 
					href=""
					>
					Logout
					</a>
				</li>
				<li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
				@endauth
			</ul><!-- main-menu -->

			<form id="logoutForm" action="{{route('logout')}}" method="POST">
				@csrf
			</form>

			<div class="src-area">
				<form action="{{route('search.post')}}" method="GET">
					@csrf
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input value="{{isset($search) ? $search : ''}}" name='search' class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>
		</div><!-- conatiner -->
    </header>
        @yield('frontend_content')
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="footer-section">
						<a class="logo" href="#"><img src="{{asset('frontend/images/logo.png')}}" alt="Logo Image"></a>
						<p class="copyright">Bona @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							@foreach ($categories as $category)
								<li><a href="{{route('category.post', $category->slug)}}">{{$category->name}}</a></li>
							@endforeach
							
							
						</ul>
						
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">
						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form action="{{route('user.subscribe')}}" method="POST">
								@csrf
								<input value="" class="email-input" name="email" type="text" placeholder="Enter your email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>								
							</form>
						</div>
						<small class="text-danger"><strong>{{$errors->first('email')}}</strong></small>
					</div><!-- footer-section -->					
				</div><!-- col-lg-4 col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</footer>
	<!-- SCIPTS -->
	<script src="{{asset('frontend/js/common-js/jquery-3.1.1.min.js')}}"></script>
	<script src="{{asset('frontend/js/common-js/tether.min.js')}}"></script>
	<script src="{{asset('frontend/js/common-js/bootstrap.js')}}"></script>
	<script src="{{asset('frontend/js/common-js/swiper.js')}}"></script>
	<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{asset('frontend/js/common-js/scripts.js')}}"></script>
	<script>
		{{--  document.addEventListener('contextmenu', function(e){
			e.preventDefault();
		})  --}}

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	@stack('js')
	{!!Toastr::message()!!}
</body>
</html>
