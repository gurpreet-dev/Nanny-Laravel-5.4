@extends('layouts.admin')
@section('content')

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<section class="content">
<!-- Info boxes -->
	<div class="row">

	@if(Auth::user()->role == 'admin')

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Clients</span>
					<span class="info-box-number">{{ count($admin['users']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-child"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Nannies</span>
					<span class="info-box-number">{{ count($admin['nannies']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Bookings</span>
					<span class="info-box-number">{{ count($admin['orders']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Services</span>
					<span class="info-box-number">{{ count($admin['services']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

	@else

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Bookings complete</span>
					<span class="info-box-number">{{ count($nanny['finished_orders']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-exchange"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Pending Requests</span>
					<span class="info-box-number">{{ count($nanny['requests']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Ongoing Bookings</span>
					<span class="info-box-number">{{ count($nanny['ongoing_orders']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Services</span>
					<span class="info-box-number">{{ count($admin['services']) }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>

	@endif	
		
	</div>

</section>		

@endsection