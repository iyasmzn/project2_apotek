<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Register Page | Iyasmzn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<!-- <link rel="stylesheet" href="/colored/css/bootstrap.css"> -->
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<!-- <link href="/colored/css/style.css" rel='stylesheet' type='text/css' /> -->
<!-- font CSS -->
<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
<!-- font-awesome icons -->
<!-- <link rel="stylesheet" href="/colored/css/font.css" type="text/css"/> -->
<!-- <link href="/colored/css/font-awesome.css" rel="stylesheet">  -->
<!-- //font-awesome icons -->
@include('admin.layouts.link')
</head>
<body class="signup-body">
		<div class="agile-signup">	
		
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Sign Up</h2>
				</div>
				<form action="{{ route('register') }}" method="post">
					@csrf
					<input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
					<br>
					<span style="color: red">{{ $errors->user->first('name') }}</span>
					<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
					<br>
					<span style="color: red">{{ $errors->user->first('email') }}</span>
					<input id="password" type="password" name="password" placeholder="Password" value="{{ old('pasword') }}">
					<br>
					<span style="color: red">{{ $errors->user->first('password') }}</span>
					<!-- <input id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" onkeyup="check();"> -->
					<!-- <input id="message" type="text" name="message" placeholder="Confirmation password status" disabled style="border: none;padding: 0px;margin: 0px;transform: translateX(20px);opacity: 1;transition: all 0.3s"> -->
					
					<input type="submit" class="register" value="Sign Up">
				</form>
				<p>Already have an account? <a href="{{ route('login') }}" class="btn btn-md btn-info" style="color: white;">Sign In</a></p>
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
			<!-- //footer -->
			
		</div>
	<!-- <script src="/colored/js/proton.js"></script> -->
	@include('admin.layouts.java')
</body>
</html>
