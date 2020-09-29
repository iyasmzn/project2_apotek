@php
	$isEdit = isset($order);
	$method = $isEdit ? method_field('PUT') : null;
	$action = $isEdit ? route('admin.orders.update', $order->id) : route('admin.orders.store');
@endphp

@extends('admin.layouts.app')

@section('title', $isEdit ? 'Edit Order' : 'Make Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.orders.index') }}">Orders</a>
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
	        					<div x-data="ordering()" x-init="() => { drugSelect() }">
	        						<div style="display: flex;justify-content: space-between;">
		        						<label style="color: darkgrey">
		        							Customer Name
		        							<input type="text" name="customer_name" x-model="customer_name" style="border: none;border-bottom: 2px solid rgb(0,188,212);margin-left: 10px;padding: 3px 10px;" required>
		        							<span style="font-size: 0.9em;color: tomato;">{{ $errors->order->first('customer_name') }}</span>

		        						</label>
		        						<label>
		        							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly>
		        							<span><b style="font-size: 1.3em">{{ Str::title(Auth::user()->name) }}</b></span>
		        						</label>
	        						</div>
	        						<br><br>
	        						<template x-for="(row, index) in rows" :key="row">
	        							<div style="margin: 20px 0px;">
	        								<label style="color: darkgrey;margin-right: 20px">
	        									Drugs
	        									<select class="drug-select" :class=" 'drug' + index " name="drug_id[]" x-model="row.drug_id" x-on:change="setPrice(row.drug_id, index)"  style="padding: 5px;display: none;">

	        										<option>~ Choose Drug Item ~</option>
	        										@foreach ($drugs as $drug)
	        										<option value="{{ $drug->id }}">{{ $drug->name }}</option>
	        										@endforeach
	        									</select>
	        									<!-- <span x-text="row.drug_id"></span> -->
	        								</label>
	        								<label style="color: darkgrey;margin-right: 20px">
	        									Qty
	        									<input :class=" 'qty' + index " type="number" name="qty[]" x-model="row.qty" value="" x-on:change="setSubtotal(index)" min="0" style="padding: 5px;width: 70px;color: black">
	        								</label>
	        								<label style="color: darkgrey;margin-right: 20px">
	        									Price
	        									<input type="number" name="price[]" x-model="row.price" value="" readonly style="width: 140px;padding: 5px;display: none;">
	        									<input class="rupiah" type="text" x-model="{{ $isEdit ? 'row.price' : 'row.showprice' }}" value="" placeholder="Rp. 0,00 /pcs" readonly style="width: 140px;padding: 5px;border: none;border-bottom: 1px solid gray;color: black"> {{ $isEdit ? '/pcs' : '' }}
	        								</label>
	        								<label style="color: darkgrey;margin-right: 20px">
	        									Subtotal
	        									<input type="number" name="subtotal[]" x-model="row.subtotal" value="" readonly style="display: none;">
	        									<input class="rupiahsub" type="text" x-model="{{ $isEdit ? 'row.subtotal' : 'row.showsubtotal' }}" value="" placeholder="Rp. 0,00 " readonly style="width: 140px;padding: 5px;border: none;border-bottom: 1px solid gray;color: black"> 
	        								</label>
			        						<button type="button" x-on:click="removeRow(index)" class="btn btn-md btn-danger"><i class="fa fa-trash-o"></i></button>
	        							</div>
	        						</template>

	        						<br>
	        						<button class="btn btn-sm btn-success" type="button" x-on:click="addRow"><i class="fa fa-plus" style="padding-right: 5px;"></i>Add More Item</button>

	        						<br>
	        						<label style="margin-top: 20px;border: 1px solid lightgray;text-align: center;padding: 7px 15px;">
	        							<span style="border-bottom: 2px solid tomato;color: tomato;font-weight: bold;">Total Value</span> <br>
	        							<input type="number" name="total" x-model="total" readonly style="border: none;font-weight: bold;color: gray;font-size: 1.4em;text-align: center;display: none">
	        							<input type="text" x-model="showtotal" placeholder="Rp. 0,00 " readonly style="padding: 5px;border: none;font-weight: bold;color: gray;font-size: 1.4em;text-align: center;">
	        						</label><br><br><br>
	        						<a href="{{route('admin.orders.index')}}" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
	        						<button class="btn btn-info">Submit <i class="fa fa-chevron-right"></i></button>

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
		function ordering() {
			const initialRow = { drug_id: null, qty: 0, price: 0, subtotal: 0 };
			const drugs = @json($drugs);
			return {
				@if($isEdit)
					rows: @json($order->order_details),
					total: {{ $order->total }},
					showtotal: 'Rp, ' + new Number({{ $order->total }}).toLocaleString("id-ID") + ',00',
					customer_name: '{{ $order->customer_name }}',
				@else
					rows: [ Object.assign( {}, initialRow ) ],
					total: 0,
					showtotal: null,
					customer_name: null,
				@endif

				drugSelect() {
					$('.drug-select').select2();
					this.rows.forEach( (row, index) => {
						$('.drug' + index).on('select2:select', e => {
							row.drug_id = e.target.value;
							this.setPrice(row.drug_id, index);
							const drug = drugs.find( drug => drug.id == row.drug_id );
							// console.log(drug);
							$(".qty" + index).attr("max", drug.stock);
						});
						@if($isEdit)
							const drug = drugs.find( drug => drug.id == row.drug_id );
							drug.stock = drug.stock + row.qty;
							console.log(drug.stock);
							$(".qty" + index).attr("max", drug.stock);						
						@endif

					});
				},
				addRow() {
					this.rows.push( Object.assign( {}, initialRow ) );
					this.$nextTick( () => { this.drugSelect() } );
				},
				removeRow(index) {
					this.rows.splice(index, 1);
					this.setTotal();
				},
				setPrice(id, index) {
					const drug = drugs.find( drug => drug.id == id );
					const result = drug && drug.price; 
					this.rows[index].price = result;
					this.rows[index].showprice = 'Rp ' + result.toLocaleString("id-ID") + ',00 /pcs';
					this.setSubtotal(index);
					// console.log(result.toLocaleString("id-ID"));
				},
				setSubtotal(index) {
					const row = this.rows[index];
					if ( row.price && row.qty ) {
						const result = row.price * row.qty;
						row.subtotal = result;
						row.showsubtotal = 'Rp ' + result.toLocaleString("id-ID") + ',00';
						// $('.rupiah').val('Rp ' + result.toLocaleString("id-ID") + ',00'); 

					}
					this.setTotal();
				},
				setTotal() {
					let result = 0;
					if ( this.rows.length == 1 ) {
						result = this.rows[0].subtotal;
					} else if ( this.rows.length > 1 ) {
						result = this.rows.reduce( ( total, row ) => ( total + row.subtotal ), 0 );
					}
					this.total = result;
					this.showtotal = 'Rp ' + result.toLocaleString("id-ID") + ',00';
				    // $('.rupiahsub').val('Rp ' + result.toLocaleString("id-ID") + ',00'); 
				},
			}
		}
	</script>

@endsection
