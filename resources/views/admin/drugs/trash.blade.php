@extends('admin.layouts.app')

@section('title', 'Drugs Trash')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.drugs.index') }}">Drugs</a>
	            <i class="fa fa-angle-right"></i>
	            <span>Trashed</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page">
	            <table id="myTable">
	            	<thead>
	            		<tr>
	            			<th style="width: 20px">No</th>
	            			<th style="text-align: left;">Code</th>
	            			<th style="width: 100px">Image</th>
	            			<th style="text-align: left;">Name</th>
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
	            					<div style="width: 75px;height: 75px;border-radius: 50px;background-color: rgb(91,192,222);background-image: url('/img/drug_img/{{ $drug->image }}');background-size: cover;background-position: center;"></div>
	            				</td>
	            				<td>{{ $drug->name }}</td>
	            				<td style="text-align: center;">{{ $drug->stock }}</td>
	            				<td style="text-align: center;">
	            					<a href="/admin/drugs/restore/{{ $drug->id }}"><i class="fa fa-arrow-left"></i></a>
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
