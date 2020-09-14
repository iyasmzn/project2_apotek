@extends('admin.layouts.app')

@section('title', 'Make an Order')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.users.index') }}">Orders</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Make Order</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">

	        	<div class="forms">
	        			<h3 class="title1"></h3>
	        			<div class="form-three widget-shadow">
	        				<form class="form-horizontal" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data" x-data="orders()">
	        					@csrf
	        					<div class="form-group">
	        						<label for="name" class="col-sm-2 control-label">Customer Name</label>
	        						<div class="col-sm-6">
	        							<input type="text" class="form-control1" name="name" id="customer_name" placeholder="Name">
	        						</div>
	        						<div class="col-sm-2" style="text-align: right;">
	        						</div>
	        						<div class="col-sm-2">
	        							<input type="hidden" class="form-control1" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
	        							<h3><span style="position: absolute;top: -20px;font-size: 0.7em;color: tomato;">User</span>{{ Str::title(Auth::user()->name) }}</h3>
	        						</div>
	        					</div>
	        					<div class="form-group" style="text-align: center;margin-top: 30px">
	        						<input type="submit" value="SUBMIT" class="btn btn-lg btn-success">
	        					</div>

								<button style="padding: 15px 35px;font-size: 1.1em" type="button" x-on:click="removeRow">- Delete</button>
								<button style="padding: 15px 35px;font-size: 1.1em" type="button" x-on:click="addRow">+ Add</button>
								<template x-for="(row, index) in rows" :key="row">
									<div style="margin: 20px 0px;">
										<label>
											Item
											<select name="item_id[]" style="padding: 5px;" x-model="row.item_id" x-on:change="setPrice(row.item_id, index)">

												<option>~ Choose Item ~</option>
												@foreach ($drugs as $drug)
												<option value="{{ $drug->id }}">{{ $drug->name }}</option>
												@endforeach
											</select>
											<!-- <span x-text="row.item_id"></span> -->
										</label>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<label>
											Qty
											<input type="number" name="qty[]" x-model="row.qty" value="" x-on:change="setSubTotal(row.item_id, index)">
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

	        				</form>
	        			</div>
	        	</div>

	        </div>
	   </div>
	    <!-- //blank-page -->
	</div>


	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
	<script type="text/javascript">
		function orders() {
			const initialRow = {item_id: null, qty: 0, price: 0, subtotal: 0}; 
			const items = @json($drugs);
			return {
				//data
				rows: [
					Object.assign({}, initialRow),
				],
				//methods
				addRow() {
					this.rows.push( Object.assign({}, initialRow) ); 
				},
				removeRow() {
					this.rows.pop(); 
				},
				setPrice(id, index) {
					// console.log(id);
					const item = items.find(item => item.id == id);
					const result = item && item.price;
					const result2 = item && item.price * this.rows[index].qty;

					this.rows[index].price = result;
					this.rows[index].subtotal = result2;
				},
				setSubTotal(id, index) {
					const item = items.find(item => item.id == id);
					const result = item && item.price * this.rows[index].qty;
					console.log(result);

					this.rows[index].subtotal = result;
				},
			}
		}
	</script>

@endsection
