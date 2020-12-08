@extends('layouts.app')
@section('content')
	<div class="container">
		<br>
		@include('flash::message')
		<!-- Summary Overview Page Header -->
		<div class="page-header page-header-reset">
			<div class="row align-items-center">
				<div class="col-sm">
					<h1 class="page-header-title">Dashboard</h1>
					<p class="page-header-text">Contains Summary Overview, In progress documents & Activity Logs.</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						  <li class="breadcrumb-item"><a href="#">Home</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Page Header -->

		<!-- Summary Overview Card -->
		<div class="card">
			<div class="card-header">
				<h5 class="card-header-title">Summary Overview</h5>
			</div>
			<div class="card-body">
				<!-- Summary Overview Table -->
				<div class="table-responsive">
					<table class="table table-text-center">
					<thead>
						<tr>
						<th scope="col"><span class="legend-indicator bg-primary"></span> Process</th>
						<th scope="col"><span class="legend-indicator bg-warning"></span> In Progress</th>
						<th scope="col"><span class="legend-indicator bg-danger"></span> Cancelled</th>
						<th scope="col"><span class="legend-indicator bg-success"></span> Completed</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">Purchase Request</th>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<th scope="row">Purchase Order</th>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<th scope="row">Voucher</th>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<th scope="row"><strong>Total</strong></th>
							<td><strong>0</strong></td>
							<td><strong>0</strong></td>
							<td><strong>0</strong></td>
						</tr>
					</tbody>
					</table>
				</div>
				<!-- End Table -->
			</div>
		</div>
  <!-- End Card -->
	</div>
@endsection
@section('script')
@endsection