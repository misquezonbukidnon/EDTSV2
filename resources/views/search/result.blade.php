@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<div class="col-md-12">
      	<div class="row">
			<div class="col-md-12">
				<div class="grid">
					<div class="grid-header">Information</div>
					<div class="grid-body">
						@switch($transactions->process_types->name)
							@case($transactions->process_types->name = "Purchase Request")
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
											<p><small>{{ $transactions->date_of_entry }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelReferenceNo"><strong>Reference No.</strong></label>
											<p><small>{{ $transactions->reference_id }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelOffices"><strong>Office</strong></label>
											<p><small>{{ $transactions->offices->name }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelApprovedBudgetForTheContract"><strong>Approved Budget for the Contract <i>(ABC)</i></strong></label>
											<div class="col-md-5">
												<input type="text" class="form-control" id="inputType5" value="{{ number_format($transactions->amount, 2, '.', ',') }}" disabled="">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDescription"><strong>Description</strong></label>
											<p><small>{{ $transactions->description }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelParticulars"><strong>Particulars</strong></label>
											<p><small>{{ $transactions->pr_descriptions->name }}</small></p>
										</div>

										{{-- <div class="form-group">
											<label for="labelStatus"><strong>Status</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><span class="badge badge-success"><small>{{ $transactions->statuses->name }}</small></span></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><span class="badge badge-danger"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@default
											@endswitch
										</div> --}}

										<div class="form-group">
											<label for="labelDocumentHolder"><strong>Current Document Holder</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><small>Municipal Budget Office</small></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><small>{{ $office_holder->offices->name }} -  Document has already been processed.</small></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><small>{{ $office_holder->offices->name }}</small></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><small>{{ $office_holder->offices->name }} -  Document has been cancelled.</small></p>
													@break
												@default
											@endswitch
										</div>

									</div>
								</div>
								<br><br>
								@break
							@case($transactions->process_types->name = "Financial Assistance")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Reference No.</th>
										<th>Date of Entry</th>
										<th>End User</th>
										<th>Address</th>
										<th>Amount</th>
										<th>Status</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
											<td><i>{{ $transactions->client }}<i></td>
											<td><i>{{ $transactions->address }}</i></td>
											<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
											<td><i>
												@switch($transactions->statuses->name)
													@case($transactions->statuses->name = "Pending")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Complete")
														<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
													@case($transactions->statuses->name = "In Progress")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Cancelled")
														<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
														@break
													@default
												@endswitch
											<i></td>
										</tr>
									</tbody>
								</table>
								@break
							@case($transactions->process_types->name = "Internet Bill")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Office</th>
										<th>Reference No.</th>
										<th>Date of Entry</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->offices->name }}</i></td>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
										</tr>
									</tbody>
								</table>
								<br><br>
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>End User</th>
										<th>Address</th>
										<th>Amount</th>
										<th>Status</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->client }}<i></td>
											<td><i>{{ $transactions->address }}</i></td>
											<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
											<td><i>
												@switch($transactions->statuses->name)
													@case($transactions->statuses->name = "Pending")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Complete")
														<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
													@case($transactions->statuses->name = "In Progress")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Cancelled")
														<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
														@break
													@default
												@endswitch
											<i></td>
										</tr>
									</tbody>
								</table>
								@break
							@case($transactions->process_types->name = "Mobile Allowance")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Reference No.</th>
										<th>Date of Entry</th>
										<th>End User</th>
										<th>Amount</th>
										<th>Status</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
											<td><i>{{ $transactions->client }}<i></td>
											<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
											<td><i>
												@switch($transactions->statuses->name)
													@case($transactions->statuses->name = "Pending")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Complete")
														<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
													@case($transactions->statuses->name = "In Progress")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Cancelled")
														<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
														@break
													@default
												@endswitch
											<i></td>
										</tr>
									</tbody>
								</table>
								@break
							@case($transactions->process_types->name = "Monetization of Leave Credits")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Reference No.</th>
										<th>Date of Entry</th>
										<th>Office</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
											<td><i>{{ $transactions->offices->name }}</i></td>
										</tr>
									</tbody>
								</table>
								<div class="col-md-7">
									<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
										<thead>
											<th>End User</th>
											<th>Amount</th>
											<th>Status</th>
										</thead>
										<tbody>
											<tr>
												<td><i>{{ $transactions->client }}<i></td>
												<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
												<td><i>
													@switch($transactions->statuses->name)
														@case($transactions->statuses->name = "Pending")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Complete")
															<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
														@case($transactions->statuses->name = "In Progress")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Cancelled")
															<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
															@break
														@default
													@endswitch
												<i></td>
											</tr>
										</tbody>
									</table>
								</div>
								@break
							@case($transactions->process_types->name = "Payroll-Overtime")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Office</th>
										<th>Reference No.</th>
										<th>Date of Entry</th>
										<th>End User</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->offices->name }}</i></td>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
											<td><i>{{ $transactions->client }}<i></td>
										</tr>
									</tbody>
								</table>
								<br><br>
								<div class="col-md-4">
									<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
										<thead>
											<th>Amount</th>
											<th>Status</th>
										</thead>
										<tbody>
											<tr>
												<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
												<td><i>
													@switch($transactions->statuses->name)
														@case($transactions->statuses->name = "Pending")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Complete")
															<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
														@case($transactions->statuses->name = "In Progress")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Cancelled")
															<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
															@break
														@default
													@endswitch
												<i></td>
											</tr>
										</tbody>
									</table>
								</div>
								@break
							@case($transactions->process_types->name = "Payroll-Salary")
								<table class="table table table-hover table-bordered table-hover table-stripped table-hover table-stripped table-responsive-sm">
									<thead>
										<th>Date of Entry</th>
										<th>Reference No.</th>
										<th>Office</th>
										<th>Employee</th>
										<th>Amount</th>
										<th>Status</th>
									</thead>
									<tbody>
										<tr>
											<td><i>{{ $transactions->date_of_entry }}</i></td>
											<td><i>{{ $transactions->reference_id }}</i></td>
											<td><i>{{ $transactions->offices->name }}</i></td>
											<td><i>{{ $transactions->client }}<i></td>
											<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
											<td><i>
												@switch($transactions->statuses->name)
													@case($transactions->statuses->name = "Pending")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Complete")
														<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
													@case($transactions->statuses->name = "In Progress")
														<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
														@break
													@case($transactions->statuses->name = "Cancelled")
														<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
														@break
													@default
												@endswitch
											<i></td>
										</tr>
									</tbody>
								</table>
								<br><br>
								{{-- <div class="col-md-4">
									<table class="table table table-hover table-bordered table-hover table-bordered table-hover table-stripped table-responsive-sm">
										<thead>
											<th>Amount</th>
											<th>Status</th>
										</thead>
										<tbody>
											<tr>
												<td><i>{{ number_format($transactions->amount, 2, '.', ',') }}</i></td>
												<td><i>
													@switch($transactions->statuses->name)
														@case($transactions->statuses->name = "Pending")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Complete")
															<span class="badge badge-pill badge-success">{{ $transactions->statuses->name }}</span>								@break
														@case($transactions->statuses->name = "In Progress")
															<span class="badge badge-pill badge-warning">{{ $transactions->statuses->name }}</span>
															@break
														@case($transactions->statuses->name = "Cancelled")
															<span class="badge badge-pill badge-danger">{{ $transactions->statuses->name }}</span>
															@break
														@default
													@endswitch
												<i></td>
											</tr>
										</tbody>
									</table>
								</div> --}}
								@break
							@case($transactions->process_types->name = "Voucher")
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
											<p><small>{{ $transactions->date_of_entry }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelReferenceNo"><strong>Reference No.</strong></label>
											<p><small>{{ $transactions->reference_id }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelSubReferenceNo"><strong>Sub Reference No.</strong></label>
											<p><small>{{ $transactions->sub_reference_id }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelPRDescription"><strong>Particulars</strong></label>
											<p><small>{{ $transactions->pr_descriptions->name }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelOffice"><strong>Office</strong></label>
											<p><small>{{ $transactions->offices->name }}</small></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDescription"><strong>Description</strong></label>
											<p><small>{{ $transactions->description }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelSupplier"><strong>Payee</strong></label>
											<p><small>{{ $transactions->client }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelContract Price"><strong>Contract Price</strong></label>
											<div class="col-md-5">
												<input type="text" class="form-control" id="inputType5" value="{{ number_format($transactions->amount, 2, '.', ',') }}" disabled="">
											</div>
										</div>

										{{-- <div class="form-group">
											<label for="labelStatus"><strong>Status</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><span class="badge badge-success"><small>{{ $transactions->statuses->name }}</small></span></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><span class="badge badge-danger"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@default
											@endswitch
										</div> --}}
										<div class="form-group">
											<label for="labelDocumentHolder"><strong>Current Document Holder</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><small>Municipal Budget Office</small></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><small>{{ $office_holder->offices->name }} -  Document has already been processed.</small></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><small>{{ $office_holder->offices->name }}</small></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><small>{{ $office_holder->offices->name }} -  Document has been cancelled.</small></p>
													@break
												@default
											@endswitch
										</div>
									</div>
								</div>
								@break
							@case($transactions->process_types->name = "Purchase Order")
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
											<p><small>{{ $transactions->date_of_entry }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelReferenceNo"><strong>Reference No.</strong></label>
											<p><small>{{ $transactions->reference_id }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelSubReferenceNo"><strong>Sub Reference No.</strong></label>
											<p><small>{{ $transactions->sub_reference_id }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelPRDescription"><strong>Particulars</strong></label>
											<p><small>{{ $transactions->pr_descriptions->name }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelOffice"><strong>Office</strong></label>
											<p><small>{{ $transactions->offices->name }}</small></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="labelDescription"><strong>Description</strong></label>
											<p><small>{{ $transactions->description }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelSupplier"><strong>Supplier</strong></label>
											<p><small>{{ $transactions->client }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelSupplierAddress"><strong>Address</strong></label>
											<p><small>{{ $transactions->address }}</small></p>
										</div>

										<div class="form-group">
											<label for="labelContract Price"><strong>Contract Price</strong></label>
											<div class="col-md-5">
												<input type="text" class="form-control" id="inputType5" value="{{ number_format($transactions->amount, 2, '.', ',') }}" disabled="">
											</div>
										</div>

										{{-- <div class="form-group">
											<label for="labelStatus"><strong>Status</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><span class="badge badge-success"><small>{{ $transactions->statuses->name }}</small></span></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><span class="badge badge-warning"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><span class="badge badge-danger"><small>{{ $transactions->statuses->name }}</small></span></p>
													@break
												@default
											@endswitch
										</div> --}}

										<div class="form-group">
											<label for="labelDocumentHolder"><strong>Current Document Holder</strong></label>
											@switch($transactions->statuses->name)
												@case($transactions->statuses->name = "Pending")
													<p><small>Municipal Procurement Office</small></p>
													@break
												@case($transactions->statuses->name = "Complete")
													<p><small>{{ $office_holder->offices->name }} -  Document has already been processed.</small></p>								
													@break
												@case($transactions->statuses->name = "In Progress")
													<p><small>{{ $office_holder->offices->name }}</small></p>
													@break
												@case($transactions->statuses->name = "Cancelled")
													<p><small>{{ $office_holder->offices->name }} -  Document has been cancelled.</small></p>
													@break
												@default
											@endswitch
										</div>
									</div>
								</div>
								@break
							@default
								<p><i>No Record</i></p>
						@endswitch
					</div>
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-md-8">
					<div class="grid">
						<div class="grid-body">
							<div class="d-flex justify-content-between">
							<p class="card-title">Timeline</p>
							</div>
							<div class="vertical-timeline-wrapper">
							<div class="timeline-vertical">
								@foreach($events as $event)
									<div class="activity-log">
										<p class="log-name">{{ $event->offices->name }}</p>
										<div class="log-details">
											<div class="col-md-12" align="right">
												<small style="color:black;">{{ $diff = Carbon\Carbon::parse($event->updated_at)->format('m-d-Y h:i:s a ') }} <br> {{ $diff = Carbon\Carbon::parse($event->updated_at)->diffForHumans() }}</small>
											</div>
											<p>{{ $event->report }}</p>
											{{-- <p><small><label for="forRemarks">Action Taken: <i>{{ $event->endorsements->actiontaken->name }}</i></label></small></p> --}}
										</div>
									</div>
									<div class="accordion" id="basic-accordion" role="tablist">
										<div class="card">
										<div class="card-header" role="tab" id="heading{{ $event->id }}">
											<a data-toggle="collapse" href="#collapse{{ $event->id }}" aria-expanded="false" aria-controls="collapse{{ $event->id }}" class="collapsed">
											<i class="header-icon mdi mdi-file-document mdi-2x"></i>Document Update </a>
										</div>
										<div id="collapse{{ $event->id }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $event->id }}" data-parent="#basic-accordion" style="">
											<div class="card-body">
												@foreach($eventupdates as $update)
													@if($event->id == $update->events_id)
														<div class="row">
															<div class="col-md-6" align="left">
																<small style="color:black;"><strong>{{ $diff = Carbon\Carbon::parse($update->updated_at)->format('m-d-Y h:i:s a ') }}</strong></small>
															</div>
															<div class="col-md-6" align="right">
																<small style="color:black;">{{ $diff = Carbon\Carbon::parse($update->updated_at)->diffForHumans() }}</small><br>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<p>
																	{{ $update->report }} &nbsp; 
																	@if (auth()->user()->roles_id == 3)	
																		<a href="/create/document/delete/{{ $update->id }}" id="btnremove" class="btn btn-xs action-btn btn-like btn-outline-danger btn-rounded">
																		<span class="mdi mdi-close-circle mdi-2x"></span>
																		</a>
																	@endif
																</p>
																<hr>
															</div>
														</div>
													@endif
												@endforeach								
												@if (auth()->user()->roles_id == 3)	
													<a href="/create/document/update/{{ $event->id }}" class="btn btn-outline-primary">Create Update</a>
												@endif
											</div>
										</div>
										</div>
									</div>
								@endforeach
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="grid">
						<div class="grid-body">
						<h2 class="grid-title"></h2>
						<div class="item-wrapper">
							<div class="accordion" id="basic-accordion" role="tablist">
							<div class="card">
								<div class="card-header" role="tab" id="headingOne">
								<a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
									<i class="header-icon mdi mdi-flask-outline"></i>Attached Documents</a>
								</div>
								<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#basic-accordion" style="">
								<div class="card-body">
									<ol>
										@foreach ($attachments as $item)
											<li><p><small>{{ $item->attachments_lists->name }}</small></p></li>
										@endforeach
									</ol>
								</div>
								</div>
							</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>	       	   
	</div>
@endsection
@section('script')
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

	<script>
		$(function() {
		    $('#transactions-data-table').DataTable();
		});
	</script>
@endsection