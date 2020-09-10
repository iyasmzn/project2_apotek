@extends('admin.layouts.app')

@section('title', 'Make an Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Orders</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Make Order</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1"></h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
	        					@csrf
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label">Customer Name</label>
	        						<div class="col-sm-6">
	        							<input type="text" class="form-control1" name="name" id="customer_name" placeholder="Name">
	        						</div>
	        						<div class="col-sm-2" style="text-align: right;">
	        						</div>
	        						<div class="col-sm-2">
	        							<input type="hidden" class="form-control1" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
	        							<h3><span style="position: absolute;top: -20px;font-size: 0.7em;color: tomato;">User</span>{{ Str::title(Auth::user()->name) }}</h3>
	        						</div>
	        					</div>
	        					<div class="form-group" style="text-align: center;margin-top: 30px">
	        						<input type="submit" value="SUBMIT" class="btn btn-lg btn-success">
	        					</div>
	        				</form>
	        			</div>
	        	</div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
