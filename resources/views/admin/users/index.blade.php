@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Users</a>
	            <i class="fa fa-angle-right"></i>
	            <span>List</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">
	        	<a href="{{ route('admin.users.create') }}" class="btn btn-md btn-info" style="margin-bottom: 20px;">Add New User</a>
	            <table id="myTable">
	            	<thead>
	            		<tr>
	            			<th style="width: 20px">No</th>
	            			<th style="width: 100px">Photo</th>
	            			<th>Name</th>
	            			<th>Email</th>
	            			<th style="width: 150px">Age</th>
	            			<th>Role</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php 
	            			$no=1; 
	            			function set_age($born_date) {
	            				if ($born_date) {
			            			$today = date("Y-m-d");
			            			$diff = date_diff(date_create($born_date), date_create($today));
			            			return $diff->format('%y');	
	            				} else {
	            					return 'Born date not filled yet!';
	            				}
	            			}
	            		?>
	            		@foreach($users as $user)

	            			<tr>
	            				<td>{{ $no++ }}</td>
	            				<td>
	            					<div style="width: 75px;height: 75px;border-radius: 50px;background-color: rgb(91,192,222);background-image: url('/img/profile_img/{{ $user->photo }}');background-size: cover;background-position: center;"></div>
	            				</td>
	            				<td>{{ $user->name }}</td>
	            				<td>{{ $user->email }}</td>
	            				<td style="text-align: center;">{{ set_age($user->born_date) }}</td>
	            				<td style="text-align: center;">{{ $user->role }}</td>
	            				<td style="text-align: center;">
	            					<a href="/admin/users/edit/{{ $user->id }}"><i class="fa fa-cogs"></i></a>
	            					<a href="/admin/users/delete/{{ $user->id }}" style="color: red;font-size: 1.3em;"><i class="fa fa-trash-o" style="transform: translateY(-2px);"></i></a>
	            				</td>
	            			</tr>

	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
