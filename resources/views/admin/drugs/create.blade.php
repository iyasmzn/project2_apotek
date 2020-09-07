@extends('admin.layouts.app')

@section('title', 'Add Drug')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.drugs.index') }}">Drugs</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Create</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1">Data</h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal" action="{{ route('admin.drugs.store') }}" method="post" enctype="multipart/form-data">
	        					@csrf
	        					<div class="form-group">
	        						<div class="col-sm-1">
	        							<span class="btn btn-sm btn-danger" onclick='document.getElementById("Disabled_Input").style = "display: inline-block";'>Edit Drug Code</span>
	        						</div>
	        						<div class="col-sm-4"  id="Disabled_Input" style="display: none;">
	        							Drug Code  <input type="text" class="form-control1" name="drug_code" value="{{ uniqid() }}">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label" style="width: 120px;">Name</label>
	        						<div class="col-sm-8">
	        							<input type="text" class="form-control1" name="name" id="name" placeholder="Username">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="radio" class="col-sm-2 control-label" style="width: 120px;">Type</label>
	        						<div class="col-sm-3">
	        							<div class="radio-inline"><label><input type="radio" name="type" value="tablet"> Tablet</label></div>
	        							<div class="radio-inline"><label><input type="radio" name="type" value="liquid"> Liquid</label></div>
	        							<div class="radio-inline"><label><input type="radio" name="type" value="cream"> Cream</label></div>
	        						</div>
	        						<label for="focusedinputStock" class="col-sm-2 control-label" style="width: 50px;">Stock</label>
	        						<div class="col-sm-1">
	        							<input type="number" class="form-control1" name="stock" id="focusedinputStock" placeholder="999">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputExpDate" class="col-sm-2 control-label" style="width: 120px;">Expired Date</label>
	        						<div class="col-sm-2">
	        							<input type="date" class="form-control1" name="exp_date" id="focusedinputExpDate">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="inputPrice" class="col-sm-2 control-label" style="width: 120px;">Price</label>
	        						<!-- <div class="col-sm-1">
	        							<p class="help-block" style="font-weight: bold;text-align: left;">Rp,</p>
	        						</div> -->
	        						<div class="col-sm-2">
	        							<input type="number" class="form-control1" id="inputPrice" placeholder="999,999" name="price" style="text-align: left;">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="info" class="col-sm-2 control-label" style="width: 120px;">Information</label>
	        						<div class="col-sm-8"><textarea name="information" id="info" cols="50" rows="4" class="form-control1" style="height: 100px;"></textarea></div>
	        					</div>
	        					<div class="form-group">
	        						<label for="image" class="col-sm-2 control-label" style="width: 120px;">Drug Image</label>
	        						<div class="col-sm-8">
	        							<input type="file" class="form-control1" id="image" accept="image/*" name="image_file">
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
