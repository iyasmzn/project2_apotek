{{--
@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

--}}
@extends('admin.layouts.app')

@section('title', '403. Forbidden')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="blank">

			<div style="background-color: white;padding: 20px;text-align: center;">
	        	<h1><span style="color: red">403.</span> <br> Forbidden User</h1>
	        	<div style="margin: 10px 0px;">Will return to previous page in <span id="countdown" style="font-weight: bold;color: red">10</span>s</div>
	        	<div class="btn btn-md btn-info" onclick="returnBack()"><i class="fa fa-arrow-left"></i> Back</div>
			</div>

	   </div>
	    <!-- //blank-page -->
	</div>


	<script type="text/javascript">

	 	var seconds = 10;
		    
	    function countdown() {
	        seconds = seconds - 1;
	        if (seconds < 0) {
	            // Chnage your redirection link here
		 		window.history.back();
	        } else {
	            // Update remaining seconds
	            document.getElementById("countdown").innerHTML = seconds;
	            // Count down using javascript
	            window.setTimeout("countdown()", 1000);
	        }
	    }

	    window.onload = function () {
		    countdown();
	 	}
		    
	 	function returnBack() {
	 		window.history.back();
	 	}

	 </script>
@endsection
