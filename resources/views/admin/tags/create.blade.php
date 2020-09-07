@extends('admin.layouts.app')

@section('title', 'Create Tag')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.tags.index') }}">Tags</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Create</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1">Form</h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal" action="{{ route('admin.tags.store') }}" method="post" enctype="multipart/form-data">
	        					@csrf
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label">Name</label>
	        						<div class="col-sm-8">
	        							<input type="text" class="form-control1" name="name" id="name" placeholder="Tag name">
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