@php
	$isEdit = isset($order);
	$method = $isEdit ? method_field('PUT') : null;
	$action = $isEdit ? route('admin.orders.update', $order->id) : route('admin.orders.store');
@endphp

@extends('admin.layouts.app')

@section('title', 'Make Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Orders</a>
	            <i class="fa fa-angle-right"></i>
	            <span>{{ $isEdit ? 'Edit an Order' : 'Make Order' }}</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1"></h3>
	        			<div class="form-three widget-shadow">
	        				<form action="{{ $action }}" method="post">
	        					@csrf {{ $method }}
	        					<div x-data="instance()" x-init="() => { initSelect() }">
	        						<div>
	        							Admin
	        							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly>
	        							<h1>{{ Auth::user()->name }}</h1>
	        						</div>
	        						<label>
	        							Customer Name
	        							<input type="text" name="customer_name" x-model="customer_name">
	        						</label>
	        						<br><br>
	        						<template x-for="(row, index) in rows" :key="row">
	        							<div style="margin: 20px 0px;">
	        								<label>
	        									Item
	        									<select class="drug-select" :class=" 'row' + index " name="drug_id[]" x-model="row.drug_id" x-on:change="setPrice(row.drug_id, index)"  style="padding: 5px;display: none;">

	        										<option>~ Choose Item ~</option>
	        										@foreach ($drugs as $item)
	        										<option value="{{ $item->id }}">{{ $item->name }}</option>
	        										@endforeach
	        									</select>
	        									<!-- <span x-text="row.drug_id"></span> -->
	        								</label>
	        								&nbsp;&nbsp;&nbsp;&nbsp;
	        								<label>
	        									Qty
	        									<input type="number" name="qty[]" x-model="row.qty" value="" x-on:change="setSubtotal(index)">
	        								</label>
	        								&nbsp;&nbsp;&nbsp;&nbsp;
	        								<label>
	        									Price/pcs
	        									<input type="number" name="price[]" x-model="row.price" value="" readonly>
	        								</label>
	        								&nbsp;&nbsp;&nbsp;&nbsp;
	        								<label>
	        									Subtotal
	        									<input type="number" name="subtotal[]" x-model="row.subtotal" value="" readonly>
	        								</label>
	        							</div>
	        						</template>

	        						<br><br>
	        						<button style="padding: 15px 35px;font-size: 1.1em" type="button" x-on:click="removeRow">- Delete</button>
	        						<button style="padding: 15px 35px;font-size: 1.1em" type="button" x-on:click="addRow">+ Add</button>

	        						<hr>

	        						<label>
	        							Total
	        							<input type="number" name="total" x-model="total" readonly>
	        						</label><br><br><br>
	        						<button style="padding: 20px 40px;font-size: 1.5em">Tumbas Niki</button>

	        					</div>

	        				</form>
	        			</div>
	        	</div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>


	

	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script type="text/javascript">
		function instance() {
			const initialRow = {drug_id: null, qty: 0, price: 0, subtotal: 0}; 
			const items = @json($drugs);
			return {
				//data
				@if($isEdit)
					rows: @json($order->order_details),
					total: {{$order->total}},
					customer_name: '{{$order->customer_name}}',
				@else
					rows: [ Object.assign({}, initialRow) ],
					total : 0,
					customer_name: '',
				@endif
				//methods
				
				initSelect() {
					$('.drug-select').select2();

					this.rows.forEach( (row, index) => {
						$( '.row' + index ).on( 'select2:select', e => {
							row.drug_id = e.target.value;
							this.setPrice(row.drug_id, index);
						} );
					} );
				},
				addRow() {
					this.rows.push( Object.assign({}, initialRow) );
					this.$nextTick( () => { this.initSelect() } ); 
				},
				removeRow() {
					this.rows.pop(); 

					this.setTotal();
				},
				setPrice(id, index) {
					// console.log(id);
					const item = items.find(item => item.id == id);
					const result = item && item.price;

					this.rows[index].price = result;
					this.setSubtotal(index);
				},
				setSubtotal(index) {
					const row = this.rows[index];
					if (row.price && row.qty) {
						const result = row.price * row.qty;
						row.subtotal = result;
					}
					this.setTotal();
				},
				setTotal() {
					let result = 0;
					if (this.rows.length > 1) {						
					 	result = this.rows.reduce((total, row) => (total + row.subtotal), 0);
					} else if (this.rows.length == 1) {
						result = this.rows[0].subtotal;
					}
				 	this.total = result;
				},
			}
		}
	</script>

@endsection
