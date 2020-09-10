@extends('admin.layouts.app')

@section('title', 'Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.orders.index') }}">Orders</a>
	            <i class="fa fa-angle-right"></i>
	            <span>List</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">
	        	<a href="{{ route('admin.orders.create') }}" class="btn btn-md btn-info" style="margin-bottom: 20px;">Make Order</a>
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

	            	</tbody>
	            </table>
	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
