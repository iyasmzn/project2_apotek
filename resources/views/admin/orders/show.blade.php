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
	        	<div class="col-md-12" style="margin-top: 30px;">
		            <table id="myTable">
		            	<thead>
		            		<tr>
		            			<th style="width: 20px">No</th>
		            			<th style="text-align: center; width: 100px;">Image</th>
		            			<th style="text-align: left;">Name</th>
		            			<th>Qty</th>
		            			<th style="text-align: right;">Subtotal</th>
		            		</tr>
		            	</thead>
		            	<tbody>
							@php 
								$no=1; 
							@endphp
		            		@foreach($odetails as $ordering)
		            		<tr>
		            			<td>{{ $no++ }}</td>
		            			<td style="text-align: center;display: flex;justify-content: center;">
		            				<div style="width: 75px;height: 75px;border-radius: 50px;background-color: rgb(91,192,222);background-image: url('/img/drug_img/{{ $ordering->drug->image }}');background-size: cover;background-position: center;"></div>
		            			</td>
		            			<td>{{ $ordering->drug->name }}</td>
		            			<td style="text-align: center;">{{ $ordering->qty }}</td>
		            			<td style="text-align: right;">Rp, {{ number_format("$ordering->subtotal",2,",",".") }}</td>
	            			</tr>
		            		@endforeach
		            	</tbody>
		            </table>
	        	</div>
	        	<div style="text-align: right;margin-bottom: 40px;" class="col-md-12">
	        		<b>Total</b> <br><div class="btn btn-md btn-warning">Rp, {{ number_format("$order->total",2,",",".") }}</div>
	        	</div>
	        	<div class="col-md-6">
	        		<a class="btn btn-md btn-danger" href="{{ route('admin.orders.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
	        	</div>
	        	@if(Auth::user()->role == 'admin' || $order->user_id == Auth::user()->id )
	        	<div class="col-md-6" style="text-align: right;">
					<a class="btn btn-md btn-success" href="{{ route('admin.orders.edit', $order->id) }}"><i class="fa fa-pencil"></i> Edit This Order</a>
	        	</div>
				@endif
	        	<div class="clearfix"></div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>

@endsection
