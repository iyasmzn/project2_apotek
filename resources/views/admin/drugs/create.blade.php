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
	        						<div class="col-sm-6">
	        							<input type="text" class="form-control1" name="name" id="name" placeholder="Username" value="{{ old('name') }}">
	        						</div>
	        						<div class="col-sm-4">
	        							<p class="help-block" style="color: red;">{{ $errors->user->first('name') }}</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="radio" class="col-sm-2 control-label" style="width: 120px;">Type</label>
	        						<div class="col-sm-2">
	        							<div class="radio-inline"><label><input type="radio" name="type" value="tablet" {{ (old('type') == 'tablet') ? 'checked' : '' }}> Tablet</label></div>
	        							<div class="radio-inline"><label><input type="radio" name="type" value="liquid" {{ (old('type') == 'liquid') ? 'checked' : '' }}> Liquid</label></div>
	        							<div class="radio-inline"><label><input type="radio" name="type" value="cream" {{ (old('type') == 'cream') ? 'checked' : '' }}> Cream</label></div>
	        						</div>
	        						<div class="col-sm-3">
	        							<p class="help-block" style="color: red;">{{ $errors->user->first('type') }}</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputStock" class="col-sm-2 control-label" style="width: 120px;">Stock</label>
	        						<div class="col-sm-1">
	        							<input type="number" class="form-control1" name="stock" id="focusedinputStock" placeholder="999" value="{{ old('stock') }}">
	        						</div>
	        						<div class="col-sm-3">
	        							<p class="help-block" style="color: red;">{{ $errors->user->first('stock') }}</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputExpDate" class="col-sm-2 control-label" style="width: 120px;">Expired Date</label>
	        						<div class="col-sm-2">
	        							<input type="date" class="form-control1" name="exp_date" id="focusedinputExpDate" value="{{ old('exp_date') }}">
	        						</div>
	        						<div class="col-sm-3">
	        							<p class="help-block" style="color: red;">{{ $errors->user->first('exp_date') }}</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="inputPrice" class="col-sm-2 control-label" style="width: 120px;">Price</label>
	        						<!-- <div class="col-sm-1">
	        							<p class="help-block" style="font-weight: bold;text-align: left;">Rp,</p>
	        						</div> -->
	        						<div class="col-sm-2">
	        							<input type="number" class="form-control1" id="inputPrice" placeholder="999,999" name="price" style="text-align: left;" value="{{ old('price') }}">
	        						</div>
	        						<div class="col-sm-3">
	        							<p class="help-block" style="color: red;">{{ $errors->user->first('price') }}</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="info" class="col-sm-2 control-label" style="width: 120px;">Information</label>
	        						<div class="col-sm-8"><textarea name="information" id="info" cols="50" rows="4" class="form-control1" style="height: 100px;">{{ old('information') }}</textarea></div>
	        					</div>
	        					<div class="form-group">
	        						<label for="image" class="col-sm-2 control-label" style="width: 120px;">Drug Image</label>
	        						<div class="col-sm-8">
	        							<input type="file" class="form-control1" id="image" accept="image/*" name="image_file">
	        						</div>
	        						<div class="col-sm-2">
	        							<p style="color: red">Max size is 2048KiB</p>
	        						</div>
	        					</div>
						        <div class="form-group">
						            <label class="col-sm-1 control-label text-left" for="hor-tags">Tags</label>
						            <div class="col-sm-5">

						                <select id="hor-tags" class="tag-select form-control" name="tags[]" multiple="multiple">

						                	@foreach(DB::table('tags')->get() as $tag)
						                	<option>{{ $tag->name }}</option>
						                	@endforeach

						                </select>

						            </div>
						        </div>
	        					<div class="form-group" style="text-align: center;margin-top: 30px">
	        						<a href="{{route('admin.drugs.index')}}" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
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
