@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
	<form action="/store/endorsement/{{ $endorsements->id }}" method ="POST" onSubmit='disableFunction()'>
			@csrf
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="grid">
							<div class="grid-header">Purchase Request Information</div>
							<div class="grid-body">
								@switch($endorsements->transactions->process_types->name)
									@case($endorsements->transactions->process_types->name = "Purchase Request")
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
													<p><small>{{ $endorsements->transactions->date_of_entry }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelReferenceNo"><strong>Reference No.</strong></label>
													<p><small>{{ $endorsements->transactions->reference_id }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelOffices"><strong>Office</strong></label>
													<p><small>{{ $endorsements->transactions->offices->name }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelApprovedBudgetForTheContract"><strong>Approved Budget for the Contract <i>(ABC)</i></strong></label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="inputType5" value="{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}" disabled="">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDescription"><strong>Description</strong></label>
													<p><small>{{ $endorsements->transactions->description }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelParticulars"><strong>Particulars</strong></label>
													<p><small>{{ $endorsements->transactions->pr_descriptions->name }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelStatus"><strong>Status</strong></label>
													@switch($endorsements->transactions->statuses->name)
														@case($endorsements->transactions->statuses->name = "Pending")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Complete")
															<p><span class="badge badge-success"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>								@break
														@case($endorsements->transactions->statuses->name = "On Process")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Cancelled")
															<p><span class="badge badge-danger"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@default
													@endswitch
												</div>
											</div>
										</div>
										@break
									@case($endorsements->transactions->process_types->name = "Financial Assistance")
										<table class="table table table-hover table-bordered table-responsive-sm">
											<thead>
												<th>Reference No.</th>
												<th>Date of Entry</th>
												<th>Beneficiary</th>
												<th>Address</th>
												<th>Amount</th>
												<th>Status</th>
											</thead>
											<tbody>
												<tr>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
													<td><i>{{ $endorsements->transactions->client }}<i></td>
													<td><i>{{ $endorsements->transactions->address }}</i></td>
													<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
													<td><i>
														@switch($endorsements->transactions->statuses->name)
															@case($endorsements->transactions->statuses->name = "Pending")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "Complete")
																<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
															@case($endorsements->transactions->statuses->name = "On Process")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "On Hold")
																<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@default
														@endswitch
													<i></td>
												</tr>
											</tbody>
										</table>
										@break
									@case($endorsements->transactions->process_types->name = "Internet Bill")
										<table class="table table table-hover table-bordered table-responsive-sm">
											<thead>
												<th>Office</th>
												<th>Reference No.</th>
												<th>Date of Entry</th>
											</thead>
											<tbody>
												<tr>
													<td><i>{{ $endorsements->transactions->offices->name }}</i></td>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
												</tr>
											</tbody>
										</table>
										<br><br>
										<table class="table table table-hover table-bordered table-responsive-sm">
											<thead>
												<th>Client</th>
												<th>Address</th>
												<th>Amount</th>
												<th>Status</th>
											</thead>
											<tbody>
												<tr>
													<td><i>{{ $endorsements->transactions->client }}<i></td>
													<td><i>{{ $endorsements->transactions->address }}</i></td>
													<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
													<td><i>
														@switch($endorsements->transactions->statuses->name)
															@case($endorsements->transactions->statuses->name = "Pending")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "Complete")
																<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
															@case($endorsements->transactions->statuses->name = "On Process")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "On Hold")
																<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@default
														@endswitch
													<i></td>
												</tr>
											</tbody>
										</table>
										@break
									@case($endorsements->transactions->process_types->name = "Mobile Allowance")
										<table class="table table table-hover table-bordered table-responsive-sm">
											<thead>
												<th>Reference No.</th>
												<th>Date of Entry</th>
												<th>Client</th>
												<th>Amount</th>
												<th>Status</th>
											</thead>
											<tbody>
												<tr>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
													<td><i>{{ $endorsements->transactions->client }}<i></td>
													<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
													<td><i>
														@switch($endorsements->transactions->statuses->name)
															@case($endorsements->transactions->statuses->name = "Pending")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "Complete")
																<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
															@case($endorsements->transactions->statuses->name = "On Process")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "On Hold")
																<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@default
														@endswitch
													<i></td>
												</tr>
											</tbody>
										</table>
										@break
									@case($endorsements->transactions->process_types->name = "Monetization of Leave Credits")
										<table class="table table table-hover table-bordered table-responsive-sm">
											<thead>
												<th>Reference No.</th>
												<th>Date of Entry</th>
												<th>Office</th>
											</thead>
											<tbody>
												<tr>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
													<td><i>{{ $endorsements->transactions->offices->name }}</i></td>
												</tr>
											</tbody>
										</table>
										<div class="col-md-7">
											<table class="table table table-hover table-bordered table-responsive-sm">
												<thead>
													<th>Client</th>
													<th>Amount</th>
													<th>Status</th>
												</thead>
												<tbody>
													<tr>
														<td><i>{{ $endorsements->transactions->client }}<i></td>
														<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
														<td><i>
															@switch($endorsements->transactions->statuses->name)
																@case($endorsements->transactions->statuses->name = "Pending")
																	<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																	@break
																@case($endorsements->transactions->statuses->name = "Complete")
																	<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
																@case($endorsements->transactions->statuses->name = "On Process")
																	<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																	@break
																@case($endorsements->transactions->statuses->name = "On Hold")
																	<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																	@break
																@default
															@endswitch
														<i></td>
													</tr>
												</tbody>
											</table>
										</div>
										@break
									@case($endorsements->transactions->process_types->name = "Payroll-Overtime")
										<table class="table table table-hover table-bordered table-responsive-sm">
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
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->offices->name }}</i></td>
													<td><i>{{ $endorsements->transactions->client }}<i></td>
													<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
													<td><i>
														@switch($endorsements->transactions->statuses->name)
															@case($endorsements->transactions->statuses->name = "Pending")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "Complete")
																<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
															@case($endorsements->transactions->statuses->name = "On Process")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "On Hold")
																<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@default
														@endswitch
													<i></td>
												</tr>
											</tbody>
										</table>
										<br><br>

										@break
									@case($endorsements->transactions->process_types->name = "Payroll-Salary")
										<table class="table table table-hover table-bordered table-responsive-sm">
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
													<td><i>{{ $endorsements->transactions->date_of_entry }}</i></td>
													<td><i>{{ $endorsements->transactions->reference_id }}</i></td>
													<td><i>{{ $endorsements->transactions->offices->name }}</i></td>
													<td><i>{{ $endorsements->transactions->client }}<i></td>
													<td><i>{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}</i></td>
													<td><i>
														@switch($endorsements->transactions->statuses->name)
															@case($endorsements->transactions->statuses->name = "Pending")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "Complete")
																<span class="badge badge-pill badge-success">{{ $endorsements->transactions->statuses->name }}</span>								@break
															@case($endorsements->transactions->statuses->name = "On Process")
																<span class="badge badge-pill badge-warning">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@case($endorsements->transactions->statuses->name = "On Hold")
																<span class="badge badge-pill badge-danger">{{ $endorsements->transactions->statuses->name }}</span>
																@break
															@default
														@endswitch
													<i></td>
												</tr>
											</tbody>
										</table>
										<br><br>
										@break
									@case($endorsements->transactions->process_types->name = "Voucher")
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
													<p><small>{{ $endorsements->transactions->date_of_entry }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelReferenceNo"><strong>Reference No.</strong></label>
													<p><small>{{ $endorsements->transactions->reference_id }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelSubReferenceNo"><strong>Sub Reference No.</strong></label>
													<p><small>{{ $endorsements->transactions->sub_reference_id }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelPRDescription"><strong>Particulars</strong></label>
													<p><small>{{ $endorsements->transactions->pr_descriptions->name }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelOffice"><strong>Office</strong></label>
													<p><small>{{ $endorsements->transactions->offices->name }}</small></p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDescription"><strong>Description</strong></label>
													<p><small>{{ $endorsements->transactions->description }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelSupplier"><strong>Payee</strong></label>
													<p><small>{{ $endorsements->transactions->client }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelContract Price"><strong>Contract Price</strong></label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="inputType5" value="{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}" disabled="">
													</div>
												</div>
		
												<div class="form-group">
													<label for="labelStatus"><strong>Status</strong></label>
													@switch($endorsements->transactions->statuses->name)
														@case($endorsements->transactions->statuses->name = "Pending")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Complete")
															<p><span class="badge badge-success"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>								@break
														@case($endorsements->transactions->statuses->name = "On Process")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Cancelled")
															<p><span class="badge badge-danger"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@default
													@endswitch
												</div>
											</div>
										</div>
										@break
									@case($endorsements->transactions->process_types->name = "Purchase Order")
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDateOfEntry"><strong>Date of Entry</strong></label>
													<p><small>{{ $endorsements->transactions->date_of_entry }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelReferenceNo"><strong>Reference No.</strong></label>
													<p><small>{{ $endorsements->transactions->reference_id }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelSubReferenceNo"><strong>Sub Reference No.</strong></label>
													<p><small>{{ $endorsements->transactions->sub_reference_id }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelPRDescription"><strong>Particulars</strong></label>
													<p><small>{{ $endorsements->transactions->pr_descriptions->name }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelOffice"><strong>Office</strong></label>
													<p><small>{{ $endorsements->transactions->offices->name }}</small></p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="labelDescription"><strong>Description</strong></label>
													<p><small>{{ $endorsements->transactions->description }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelSupplier"><strong>Supplier</strong></label>
													<p><small>{{ $endorsements->transactions->client }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelSupplierAddress"><strong>Address</strong></label>
													<p><small>{{ $endorsements->transactions->address }}</small></p>
												</div>
		
												<div class="form-group">
													<label for="labelContract Price"><strong>Contract Price</strong></label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="inputType5" value="{{ number_format($endorsements->transactions->amount, 2, '.', ',') }}" disabled="">
													</div>
												</div>
		
												<div class="form-group">
													<label for="labelStatus"><strong>Status</strong></label>
													@switch($endorsements->transactions->statuses->name)
														@case($endorsements->transactions->statuses->name = "Pending")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Complete")
															<p><span class="badge badge-success"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>								@break
														@case($endorsements->transactions->statuses->name = "On Process")
															<p><span class="badge badge-warning"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
															@break
														@case($endorsements->transactions->statuses->name = "Cancelled")
															<p><span class="badge badge-danger"><small>{{ $endorsements->transactions->statuses->name }}</small></span></p>
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
					@switch(auth()->user()->offices_id)
						{{-- MTO --}}
						@case(auth()->user()->offices_id == 20)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">

													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="1">Complete Transaction</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
															</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}

												{{-- Attachments --}}

												<div class="col-sm-12">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>	
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break

						{{-- MMO --}}
						@case(auth()->user()->offices_id == 24)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">

													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="4">Cancel Document</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}
												{{-- Attachments --}}

												<div class="col-sm-12">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>	
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break
						{{-- MACCO --}}
						@case(auth()->user()->offices_id == 19)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">

													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="1">Complete Transaction</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}

												{{-- Attachments --}}

												<div class="col-sm-12">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>	
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break
						{{-- MBO --}}
						@case(auth()->user()->offices_id == 18)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="form-group">
													<label for="selectROffice">Receiving Office</label>
													<select class="custom-select" name="receiving_offices_id">
													<option value="">Click to select</option>		
													{{-- @foreach ($receiving_offices as $office)					 --}}
														{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
													{{-- @endforeach --}}
													<option value="18">Municipal Budget Office</option>
													<option value="24">Municipal Mayor's Office</option>
													<option value="5">Bids & Awards Committee</option>
													<option value="6">Procurement Office</option>
													<option value="9">General Services Office</option>
													<option value="19">Municipal Accounting Office</option>
													<option value="20">Municipal Treasurer's Office</option>
													
													</select>
													<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="1">Complete Transaction</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}

												{{-- Attachments --}}

												<div class="col-sm-12">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>	
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break
						{{-- BAC --}}
						@case(auth()->user()->offices_id == 5)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">

													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="1">Complete Transaction</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}

												{{-- Attachments --}}

												<div class="col-sm-6">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>	
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>	
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break
						{{-- GSO/Procurement Office --}}
						@case(auth()->user()->offices_id == 6)
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">

													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														<option value="1">Complete Transaction</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}

												{{-- Attachments --}}

												<div class="col-sm-6">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>
												<hr>
												<div class="col-sm-12" align="center">
													<h5>Document Update</h5><br><hr>
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>	
											</div>										
										</div>
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
							</div>
							@break
						@default
							<div class="col-md-12">
								<div class="grid">
									<div class="grid-header">Endorsement Information</div>
									<div class="grid-body">
										<div class="item-wrapper">
											<div class="row">
												<div class="col-sm-6">							
													<div class="form-group">
														<label for="inputDOE">Date of Endorsement</label>
														<input type="date" class="form-control" id="inputDOE" name="date_endorsed" aria-describedby="DOEHelp" placeholder="Date of Endorse" required>
														<small id="DOEHelp" class="form-text text-muted">Please enter the date of endorsement.</small>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectROffice">Receiving Office</label>
														<select class="custom-select" name="receiving_offices_id">
														<option value="">Click to select</option>		
														{{-- @foreach ($receiving_offices as $office)					 --}}
															{{-- <option value="{{$office->id}}"> {{ $office->name}} </option> --}}
														{{-- @endforeach --}}
														<option value="18">Municipal Budget Office</option>
														<option value="24">Municipal Mayor's Office</option>
														<option value="5">Bids & Awards Committee</option>
														<option value="6">Procurement Office</option>
														<option value="9">General Services Office</option>
														<option value="19">Municipal Accounting Office</option>
														<option value="20">Municipal Treasurer's Office</option>
														
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select receiving office.</small>
													</div>

													<input type="hidden" class="form-control" id="inputTransactionid" name="endorsing_offices_id" value="{{ auth()->user()->offices_id }}">
													<input type="hidden" class="form-control" id="inputTransactionid" name="transactions_id" value="{{ $endorsements->transactions->id }}">
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Endorsement Status</label>
														<select class="custom-select" name="statuses_id"  required>
														<option value="">Select Status</option>
														<option value="3">Endorse Document</option>
														</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select endorsement status.</small>
													</div>
												</div>
												{{-- <div class="col-sm-6">
													<div class="form-group">
														<label for="selectStatus">Action Taken</label>
														<select class="custom-select" name="remarks"  required>
															<option value="">Select Status</option>
															@foreach($actions as $action)
																<option value="{{ $action->id }}">{{ $action->name }}</option>
															@endforeach
															</select>
														<small id="rofficeHelp" class="form-text text-muted">Please select action status.</small>
													</div>
												</div> --}}
												{{-- Attachments --}}

												<div class="col-sm-6">
													<div class="form-group">
														<label for="inputAttachments">Attachments</label><br>
														{{-- <input type="text" class="form-control" id="inputAttachments" name="attachments" aria-describedby="doeHelp" placeholder="Attachments" required> --}}
														<select class="js-example-basic-multiple" name="attachments[]" multiple="multiple" style="width: 100%">
															@foreach ($attachmentLists as $data)
																<option value="{{ $data->id }}">{{ $data->name }}</option>
															@endforeach
														</select>
														<input type="text" name="attachment_ref_id" hidden>
														<small id="docHelp" class="form-text text-muted">Please Select Attachments.</small>
													</div>
												</div>
												<hr>
												<div class="col-sm-12" align="center">
													<br>
													<h5>Document Update</h5><br><hr>	
												</div>
												<div class="col-sm-6">
													<textarea id="simpleMde" name="report" style="display: none;"></textarea>
											   </div>
											   <div class="col-md-6">
												<div class="table-responsive">
													<table id="words-data-table" class="table table-bordered table-condensed" width="100%">
														<thead>
															<tr>
																<th>Actions</th>
															</tr>
														</thead>
														<tbody>
															@foreach($actions as $action)
																<tr>
																	<td>{{ $action->name }}</td>
																</tr>
															@endforeach
														</tbody>
														<tfoot>
															<tr>
																<th>Actions</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											</div>										
										</div>
										{{-- <div align="center">
											<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#info-modal"> Click Me Important! </button>
											<hr>
										</div> --}}
										<div align="center" style="margin-top: 2em;">	
											{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
											<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
											<a href="/endorsement" class="btn btn-outline-primary">Back</a>
										</div>	
									</div>
								</div>
								{{-- <div class="modal fade" tabindex="-1" role="dialog" id="info-modal" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document">
									  <div class="modal-content">
										<div class="modal-header">
											<strong>Important Reminder</strong>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										  </button>
										</div>
										<div class="modal-body">
										  <div class="d-flex flex-column justify-content-center align-items-center">
											<i class="mdi mdi-account-multiple mdi-4x text-primary"></i>
											<h5 class="text-black font-weight-medium mb-4">Document Update Reminder</h5>
											<p>Please be reminded that all endorsed documents must contain an<strong> update</strong> from the endorsing office. To create an update, please go to <strong>Home > Track Documents > Find Records > Document Update > Create Update</strong></p>
										  </div>
										</div>
										<div class="modal-footer d-flex justify-content-center">
										  <button type="button" class="btn btn-sm btm-outline-primary" data-dismiss="modal">Got it!</button>
										</div>
									  </div>
									</div>
								</div> --}}
							</div>
					@endswitch
				</div>
			</div>	       	   
		</form>
	</div>
@endsection
@section('script')
	{{-- <script>
		$(function(){
			$("#btnverzenden").click(function () {
				$("#btnverzenden").hide(); 
				$("#btnverzenden2").show(); 
			});
		});
	</script> --}}
	<script>
		function disableFunction() {
			$('#btnverzenden').prop('disabled', true);
		}
	</script>
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

	<script>
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();
		});
	</script>

	<script>
		$(function() {
			$('#words-data-table').DataTable();
		});
	</script>
@endsection
