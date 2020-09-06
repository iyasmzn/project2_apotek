@extends('admin.layouts.app')

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
	        	<a href="{{ route('admin.users.create') }}" class="btn btn-md btn-success" style="margin-bottom: 20px;">Add New User</a>
	            <table id="myTable">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th style="width: 100px">Photo</th>
	            			<th>Name</th>
	            			<th>Email</th>
	            			<th>Role</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no=1; ?>
	            		@foreach($users as $user)

	            			<tr>
	            				<td>{{ $no++ }}</td>
	            				<td>
	            					<div style="width: 100px;height: 100px;border-radius: 50px;background-color: gray;"></div>
	            				</td>
	            				<td>{{ $user->name }}</td>
	            				<td>{{ $user->email }}</td>
	            				<td>{{ $user->role }}</td>
	            				<td>
	            					<i class="fa fa-trash"></i>
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
