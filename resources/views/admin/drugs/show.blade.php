@extends('admin.layouts.app')

@section('title', 'Show Drug')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.drugs.index') }}">Drugs</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Show - {{ $drug->drug_code }}</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1">Drug Item</h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal">
	        					<div class="form-group">
	        						<div class="col-sm-4"  id="Disabled_Input">
	        							<input type="text" class="btn btn-info" name="drug_code" value="Code = {{ $drug->drug_code }}" style="background-color: gray" readonly>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						@if(isset($drug->image))

	        						<img src="/img/drug_img/{{ $drug->image }}" height="200">

	        						@else

	        						<div style="width: 200px; height: 200px;background-color: rgb(91,192,222);background-image: url('/img/drug_img/{{ $drug->image }}');background-position: center;background-size: cover;color: white;display: flex;justify-content: center;align-items: center;">No Image</div>

	        						@endif
	        					</div>
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label" style="width: 120px;">Name</label>
	        						<div class="col-sm-8">
	        							<input type="text" class="form-control1" name="name" id="name" placeholder="Username" value="{{ $drug->name }}" style="color: black;font-size: 1.3em;border: none;font-weight: bold;text-transform: capitalize;" readonly>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="radio" class="col-sm-2 control-label" style="width: 120px;">Type</label>
	        						<div class="col-sm-3">
	        							<span class="btn btn-md btn-success">{{ $drug->type }}</span>
	        						</div>
	        						<label for="focusedinputStock" class="col-sm-2 control-label" style="width: 50px;">Stock</label>
	        						<div class="col-sm-1">
	        							<span class="btn btn-md btn-info">{{ $drug->stock }}</span>
	        						</div>
	        						<label for="focusedinputStock" class="col-sm-2 control-label" style="width: 50px;">Sold</label>
	        						<div class="col-sm-1">
	        							<span class="btn btn-md btn-warning">{{ $drug->sold }}</span>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputExpDate" class="col-sm-2 control-label" style="width: 120px;">Expired Date</label>
	        						<div class="col-sm-2">
	        							<input type="text" class="form-control1" name="exp_date" id="focusedinputExpDate" value="{{ date( 'F dS, Y', strtotime($drug->exp_date) ) }}" style="color: black;font-size: 1.3em;border: none;" readonly>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="inputPrice" class="col-sm-2 control-label" style="width: 120px;">Price</label>
	        						<!-- <div class="col-sm-1">
	        							<p class="help-block" style="font-weight: bold;text-align: left;">Rp,</p>
	        						</div> -->
	        						<div class="col-sm-2">
	        							<span class="btn btn-md btn-danger" style="background-color: red">Rp, {{ number_format("$drug->price", 2, ",", ".") }}</span>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="info" class="col-sm-2 control-label" style="width: 120px;">Information</label>
	        						<div class="col-sm-8"><textarea readonly name="information" id="info" cols="50" rows="4" class="form-control1" style="height: 100px;">{{ $drug->information ? '$drug->information': 'No information added' }}</textarea></div>
	        					</div>
						        <div class="form-group">
						            <label class="col-sm-1 control-label text-left" for="hor-tags">Tags</label>
						            @foreach($drug->Tag()->get() as $tag)
						            	<span class="btn btn-warning btn-sm"><i class="fa fa-tag"></i> {{ $tag->name }}</span>
						            @endforeach
						        </div>
	        					<div class="form-group" style="text-align: center;margin-top: 30px">
	        						<a href="{{ route('admin.drugs.index') }}" class="btn btn-md btn-info"><i class="fa fa-arrow-left"></i> Back</a>
	        						<a href="{{ route( 'admin.drugs.edit', $drug->id ) }}" class="btn btn-md btn-danger"><i class="fa fa-pencil"></i> Edit</a>
	        					</div>
	        				</form>
	        			</div>
	        	</div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
