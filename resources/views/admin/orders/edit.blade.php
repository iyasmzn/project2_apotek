@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Users</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Edit</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1">Form</h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal" action="/admin/users/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
	        					@csrf @method('PUT')
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label">Name</label>
	        						<div class="col-sm-8">
	        							<input type="text" class="form-control1" name="name" id="name" placeholder="Username" value="{{ $user->name }}">
	        						</div>
	        						<div class="col-sm-2">
	        							<p class="help-block" style="color: red;">Important!</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputEmail" class="col-sm-2 control-label">Email</label>
	        						<div class="col-sm-8">
	        							<input type="text" class="form-control1" name="email" id="focusedinputEmail" placeholder="Email" value="{{ $user->email }}">
	        						</div>
	        						<div class="col-sm-2">
	        							<p class="help-block" style="color: red;">Important!</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="inputPassword" class="col-sm-2 control-label">New Password</label>
	        						<div class="col-sm-8">
	        							<input type="password" class="form-control1" id="inputPassword" placeholder="New Password" name="password">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="inputPasswordconfirmation" class="col-sm-2 control-label">Confirm New Password</label>
	        						<div class="col-sm-8">
	        							<input type="password" class="form-control1" id="inputPasswordconfirmation" placeholder="New Password" disabled>
	        						</div>
	        						<div class="col-sm-2">
	        							<p class="help-block" style="color: red;">Belum Bisa!</p>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="radio" class="col-sm-2 control-label">Gender</label>
	        						<div class="col-sm-8">
	        							<div class="radio-inline"><label><input type="radio" name="gender" value="L" {{ ($user->gender == 'L' ) ? 'checked' : ''  }}> Male</label></div>
	        							<div class="radio-inline"><label><input type="radio" name="gender" value="P" {{ ($user->gender == 'P' ) ? 'checked' : ''  }}> Female</label></div>
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="focusedinputBornDate" class="col-sm-2 control-label">Born Date</label>
	        						<div class="col-sm-2">
	        							<input type="date" class="form-control1" name="born_date" id="focusedinputBornDate" placeholder="Y m d"  value="{{ $user->born_date }}">
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<label for="adres" class="col-sm-2 control-label">Address</label>
	        						<div class="col-sm-8"><textarea name="address" id="adres" cols="50" rows="4" class="form-control1" style="height: 100px;">{{ $user->address }}</textarea></div>
	        					</div>
	        					<div class="form-group">
	        						<label for="photos" class="col-sm-2 control-label">Photo Profile</label>
	        						<div class="col-sm-8">
	        							<input type="file" class="form-control1" id="photos" accept="image/*" name="photo_file">
	        						</div>
	        						<div class="col-sm-2">
	        							<p style="color: red">Max size is 2048KiB</p>
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
