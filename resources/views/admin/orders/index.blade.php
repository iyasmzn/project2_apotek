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
	            			<th style="text-align: left;">Transaction Date</th>
	            			<th>Time</th>
	            			<th style="text-align: left;">Admin</th>
	            			<th style="text-align: left;">Customer Name</th>
	            			<th>Total</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
						@php $no=1; @endphp
	            		@foreach($orders as $order)
	            		<tr>
	            			<td>{{ $no++ }}</td>
	            			<td>{{ date('l, F jS, Y', strtotime($order->created_at)) }}</td>
	            			<td>{{ date('H:i:s A', strtotime($order->created_at)) }}</td>
	            			<td>{{ Str::title($order->user->name) }}</td>
	            			<td>{{ Str::title($order->customer_name) }}</td>
	            			<td style="text-align: center;">Rp, {{ number_format("$order->total",2,",",".") }}</td>
	            			<td style="text-align: center;">
            					<a href="{{ route('admin.orders.edit', $order->id) }}"><i class="fa fa-cogs"></i></a>
            					<form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" style="display: inline-block;">
            						@csrf @method('DELETE')

	            					<button style="color: red;font-size: 1.3em;background-color: white;border: none;"><i class="fa fa-trash-o" style="transform: translateY(-2px);"></i></button>	            						
            					</form>
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
