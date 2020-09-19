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

@endsection

