<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Flat Sign Up Form Responsive Widget Template| Home :: W3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="{{asset ('assets/register/css/style.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset ('assets/register/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header-->
	<div class="header-w3l">
		<a class="txt2" href="{{ url('/') }}">
			<h1>Admin Hospital</h1> </a>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Sign Up</h2>
		<div class="sub-main">	
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<input id="name" placeholder="Name" name="name" class="name" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
					@if ($errors->has('name'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif

				<input placeholder="Phone Number" name="noHp" class="number" type="text" required="">
					<span class="icon2"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
					@if ($errors->has('noHp'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('noHp') }}</strong>
						</span>
					@endif
				<input placeholder="Email" name="email" class="mail" type="text" required="">
					<span class="icon3"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
					@if ($errors->has('email'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				
				<input  placeholder="Password" name="password" class="pass" type="password" required="">
					<span class="icon4"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
					@if ($errors->has('password'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif

				<input  placeholder="Confirm Password" name="password_confirmation" class="pass" type="password" required="">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				
				<input type="submit">
			</form>
		</div>
		<div class="clear"></div>
</div>
<!--//main-->

<!--footer-->
{{-- <div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div> --}}
<!--//footer-->

</body>
</html>