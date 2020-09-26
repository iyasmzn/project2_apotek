@extends('admin.layouts.app')

@section('title', 'Make Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.orders.index') }}">Orders</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Show Order - {{ date('Y / F-dS', strtotime($order->created_at)) }}</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="col-md-6" style="padding-top: 20px;"><span style="color: gray">Customer Name : </span><b>{{ Str::title($order->customer_name) }}</b></div>
	        	<div class="col-md-6" style="text-align: right;">
	        		<span class="btn btn-lg btn-info">{{ $order->user->name }}</span>
	        	</div>
	        	<div class="col-md-12">
		            <table>
		            	<thead>
		            		<tr>
		            			<th style="width: 20px">No</th>
		            			<th style="text-align: left;">Image</th>
		            			<th style="text-align: left;">Name</th>
		            			<th style="text-align: left;">Qty</th>
		            			<th style="text-align: left;">Subtotal</th>
		            		</tr>
		            	</thead>
		            	<tbody>
							@php 
								$no=1; 
							@endphp
		            		@foreach($odetails as $order)
		            		<tr>
		            			<td>{{ $no++ }}</td>
		            			<td></td>
		            			<td style="text-align: center;">{{ $order->drug->name }}</td>
		            			<td>{{ $order->qty }}</td>
		            			<td>{{ $order->subtotal }}</td>
	            			</tr>
		            		@endforeach
		            	</tbody>
		            </table>
	        	</div>
	        	<div class="clearfix"></div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
