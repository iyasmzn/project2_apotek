@extends('admin.layouts.app')

@section('title', 'User ~ Profile')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Users</a>
	            <i class="fa fa-angle-right"></i>
	            <span>{{ Str::title(Auth::user()->name) }}</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page" style="display: inline-block;">
    			<h3 class="title1">Profile</h3>
	        </div>

	        <div style="display: flex;flex-direction: row; width: 80%;background-color: white;margin-top: 10px;justify-content: space-around;height: 500px">
	        	<div style="height: 100%;background-color: rgb(91,192,222);width: 50%;background-image: url('/img/profile_img/{{ $user->photo }}');background-size: cover;background-position: right;">
	        	</div>
	        	<?php function set_age($born_date) {
	            				if ($born_date) {
			            			$today = date("Y-m-d");
			            			$diff = date_diff(date_create($born_date), date_create($today));
			            			return $diff->format('%y');	
	            				} else {
	            					return '';
	            				}
	            			} ?>
	        	<div style="width: 100%;padding: 30px;padding-left: 50px;">
	        		<table>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Name</span></td>
	        				<td>
				        		<h1 style="margin: 5px 0px;color: rgb(0,188,212)"> {{ Str::title($user->name) }} </h1>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Email</span></td>
	        				<td>
				        		<h1 style="margin: 5px 0px;color: rgb(0,188,212)"> {{ $user->email }} </h1>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Gender</span></td>
	        				<td>
				        		<h3 style="margin: 5px 0px;color: rgb(0,188,212)"> {{ $user->gender == 'L' ? 'Male' : 'Female' }} </h3>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Birth Date</span></td>
	        				<td>
				        		<h3 style="margin: 5px 0px;color: rgb(0,188,212)">{{ date('F jS, Y', strtotime($user->born_date)) }} </h3>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Age</span></td>
	        				<td>
				        		<h3 style="margin: 5px 0px;color: rgb(0,188,212)">{{ $user->born_date ? set_age($user->born_date) : '-' }} </h3>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Role</span></td>
	        				<td>
				        		<h1 style="margin: 5px 0px;color: rgb(0,188,212)"><span class="btn btn-warning">{{ $user->role }}</span></h1>
	        				</td>
	        			</tr>
	        			<tr>
	        				<td><span style="color: gray;font-size: 1em;padding-right: 20px;">Address</span></td>
	        				<td>
				        		<h3 style="margin: 5px 0px;color: rgb(0,188,212)">{{ $user->address ? $user->address : '-' }}</h3>
	        				</td>
	        			</tr>
	        		</table>

		        	<div style="margin-top: 50px;">
			        	<div class="btn btn-md btn-info" onclick="returnBack()"><i class="fa fa-arrow-left"></i> Back</div>
			        	@if(Auth::user()->role == 'admin' || Auth::user()->id == $user->id )
		        		<a href="/admin/users/edit/{{ $user->id }}/fromView" class="btn btn-danger">Edit Profile</a>
		        		@endif
		        	</div>

	        	</div>
	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
