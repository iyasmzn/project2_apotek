@extends('admin.layouts.app')

@section('title', 'Drugs')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="index.html">Home</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Blank</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">
	        	<a href="{{ route('admin.drugs.create') }}" class="btn btn-md btn-info" style="margin-bottom: 20px;">Add New DRUG</a>

	            <table id="myTable">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Code</th>
	            			<th style="width: 100px">Image</th>
	            			<th>Name</th>
	            			<th>Stock</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no=1; ?>
	            		@foreach($drugs as $drug)

	            			<tr>
	            				<td>{{ $no++ }}</td>
	            				<td>{{ $drug->drug_code }}</td>
	            				<td>
	            					<div style="width: 100px;height: 100px;border-radius: 50px;background-color: gray;"></div>
	            				</td>
	            				<td>{{ $drug->name }}</td>
	            				<td>{{ $drug->stock }}</td>
	            				<td style="text-align: center;">
	            					<a href="/admin/drugs/edit/{{ $drug->id }}"><i class="fa fa-cogs"></i></a>
	            					<form action="/admin/drugs/delete/{{ $drug->id }}" method="post" style="display: inline-block;">
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
