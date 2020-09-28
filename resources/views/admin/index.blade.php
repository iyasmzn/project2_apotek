@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

	<div class="social grid">
			<div class="grid-info">
				<div class="col-md-3 top-comment-grid">
					<a href="{{ route('admin.users.index') }}">
						<div class="comments likes">
							<div class="comments-icon">
								<i class="fa fa-users" style="font-size: 7em;color: white"></i>
							</div>
							<div class="comments-info likes-info">
								<h3>{{ count(DB::table('users')->get()) }}</h3>
								<a href="{{ route('admin.users.index') }}">Users</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</a>
				</div>
				<div class="col-md-3 top-comment-grid">
					<a href="{{ route('admin.drugs.index') }}">
						<div class="comments">
							<div class="comments-icon">
								<i class="fa fa-ambulance" style="font-size: 7em;color: white"></i>
							</div>
							<div class="comments-info">
								<h3>{{ count(DB::table('drugs')->get()) }}</h3>
								<a href="{{ route('admin.drugs.index') }}">Drugs</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</a>
				</div>
				<div class="col-md-3 top-comment-grid">
					<a href="{{ route('admin.tags.index') }}">
						<div class="comments tweets">
							<div class="comments-icon">
								<i class="fa fa-tag" style="font-size: 7em;color: white"></i>
							</div>
							<div class="comments-info tweets-info">
								<h3>{{ count(DB::table('tags')->get()) }}</h3>
								<a href="{{ route('admin.tags.index') }}">Tags</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</a>
				</div>
				<div class="col-md-3 top-comment-grid">
					<a href="{{ route('admin.orders.index') }}">
						<div class="comments views">
							<div class="comments-icon">
								<i class="fa fa-bar-chart" style="font-size: 7em;color: white"></i>
							</div>
							<div class="comments-info views-info">
								<h3>{{ count(DB::table('orders')->get()) }}</h3>
								<a href="{{ route('admin.orders.index') }}">Orders</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="social grid">
			<div class="grid-info">
				<div class="col-md-12">
					<h3 style="color: gray;margin-bottom: 20px;">Drug Stock n Sold Charts</h3>
					<div id="barChart" style="height: 400px"></div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="social grid col-md-12">
			<div class="grid-info">
				<div class="col-md-12">
					<h3 style="color: gray;margin-bottom: 20px;">Latest Orders</h3>
					<table id="latestOrder">
						<thead>
							<tr>
								<th style="width: 20px">No</th>
								<th style="text-align: left;">Date</th>
								<th style="text-align: left;">Customer Name</th>
								<th style="text-align: left;">Total</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							@php 
								$no = 1;
								$orders = DB::table('orders')->orderBy('created_at', 'desc')->paginate(7);
							@endphp
							@foreach($orders as $order)
							<tr>
								<td style="text-align: center;">{{ $no++ }}</td>
								<td>{{ date( 'Y, F/dS', strtotime($order->created_at) ) }}</td>
								<td>{{ $order->customer_name }}</td>
								<td>Rp, {{ number_format("$order->total",2,",",".") }}</td>
								<td style="text-align: center;">
	            					<a href="{{ route('admin.orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- <div class="col-md-4" style="text-align: right;"> -->
					<!-- <h3 style="color: gray;margin-bottom: 20px;">Datas Charts</h3> -->
					<!-- <div id="soldChart" style="height: 400px"></div>													 -->
				<!-- </div> -->
				<div class="clearfix"> </div>
			</div>
		</div>
@endsection

