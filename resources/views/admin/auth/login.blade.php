<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Login Page | Iyasmzn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="/colored/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="/colored/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="/colored/css/font.css" type="text/css"/>
<link href="/colored/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2 class="text-white">SIGN IN</h2>
				</div>
				<form action="{{ route('loginProcess') }}" method="post">
					@csrf
					<input type="text" placeholder="Username" name="name" value="{{ old('name') }}"><br>
					<span style="color: red">{{ $errors->user->first('name') }}</span>

					<input type="password" placeholder="Password" name="password"><br>
					@if(Session::has('error'))
					<span style="color: red">{{ Session::get('error') }}</span>
					@endif

					<input type="submit" class="register" value="Login">
				</form>
				<div class="signin-text">
					<div class="text-right">
						<p><a href="{{ route('register') }}" class="btn btn-md btn-warning" style="color: white;"> Create New Account</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
			<!-- //footer -->
			
		</div>
	<script src="/colored/js/proton.js"></script>
</body>
</html>
