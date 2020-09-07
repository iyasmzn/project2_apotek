@extends('admin.layouts.app')

@section('title', 'Tags')

@section('content')
	
	<div class="agile-grids">   
	    <!-- blank-page -->
	    
	    <div class="banner">
	        <h2>
	            <a href="{{ route('admin.tags.index') }}">Tags</a>
	            <i class="fa fa-angle-right"></i>
	            <span>List</span>
	        </h2>
	    </div>
	    
	    <div class="blank">
	        <div class="blank-page" style="padding: 40px;">
	        	<a href="{{ route('admin.tags.create') }}" class="btn btn-md btn-info" style="margin-bottom: 20px;">Add New Tag</a>

	            <table id="myTable">
	            	<thead>
	            		<tr>
	            			<th style="width: 20px">No</th>
	            			<th style="text-align: left;">Name</th>
	            			<th>Action</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php 
	            			$no=1; 
	            		?>
	            		@foreach($tags as $tag)

	            			<tr>
	            				<td>{{ $no++ }}</td>
	            				<td>{{ $tag->name }}</td>
	            				<td style="text-align: center;">
	            					<form action="/admin/tags/delete/{{ $tag->id }}" method="post" style="display: inline-block;">
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
