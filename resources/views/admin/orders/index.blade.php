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
	            			<th>Admin</th>
	            			<th>Customer Name</th>
	            			<th>Total</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
						@php $no=1; @endphp
	            		@foreach($orders as $order)
	            		<tr>
	            			<td>{{ $no++ }}</td>
	            			<td>{{ $order->user->name }}</td>
	            			<td>{{ $order->customer_name }}</td>
	            			<td>{{ $order->total }}</td>
	            			<td>Action</td>
            			</tr>
	            		@endforeach
	            	</tbody>
	            </table>
	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
