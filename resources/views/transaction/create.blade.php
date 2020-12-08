@extends('layouts.app')
@section('content')
	<div class="container">
		<br>
		@include('flash::message')
		<!-- Summary Overview Page Header -->
		<div class="page-header page-header-reset">
			<div class="row align-items-center">
				<div class="col-sm">
					<h1 class="page-header-title">New Document</h1>
					<p class="page-header-text">Create new document to track.</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						  <li class="breadcrumb-item"><a href="/home">Home</a></li>
						  <li class="breadcrumb-item"><a href="/create/transaction">Create Transaction</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Page Header -->
		<div class="card card-lg mb-10">
			<div class="card-header">
				<h5 class="card-header-title">Details</h5>
			</div>
			<div class="card-body">
				<form action="{{ url('/store/transaction') }}" method ="POST" id="transaction_form" onSubmit='disableFunction()'>
					@csrf
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<!-- Form Group -->
								<div class="js-form-message form-group">
									<label class="input-label" for="signinSrEmail">Date of Entry</label>
									<input type="date" class="form-control form-control-sm" name="date_of_entry" id="inputDOE" tabindex="1" required data-msg="Please enter a valid date.">
									{{-- Status Transaction	 --}}
									<input type="hidden" id="statid" name="statuses_id" value="2">
									<br>
									{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
									<button class="btn btn-sm btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
								</div>
								<!-- End Form Group -->
							</div>
							<div class="col-md-7">
								<!-- Select Process Form Group -->
								<div class="js-form-message form-group">
									<label class="input-label" for="inputSelect">Select</label>
									<select name="process_type" id="process_selector" class="custom-select custom-select-sm">
										<option value="0">Click to select</option>		
										<option value="1">Purchase Request</option>
										<option value="2">Purchase Order</option>
										<option value="3">Voucher</option>
									</select>
								</div> 
								<!-- End Form Group -->

								{{-- purchase request --}}
								<div class="selectTypePR" id="PR" style="display: none;">
									<input type="hidden" name="trigger" value="1">
									{{--Office--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectOffice">Office</label>
										<select class="custom-select custom-select-sm" name="offices_id">
										<option value="">Click to select</option>		
										@foreach ($offices as $office)					
											<option value="{{$office->id}}"> {{ $office->name}}
											</option>
										@endforeach
										</select>
									</div>
				
									{{--Reference No.--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputEstamount">Reference No.</label>
										<div class="row">
											<div class="col-sm-4">
												<label for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
												<select class="custom-select custom-select-sm" name="fund">
													<option value="">Select Fund</option>
													<option value="GF">General Fund</option>
													<option value="TF">Trust Fund</option>
													<option value="SEF">Special Education Fund</option>		
												</select>
											</div>
											<div class="col-sm-8">
												<label for="inputEstamount"><small><i>Reference No.</i></small></label>
												<input type="text" class="form-control form-control-sm" id="inputPrnumber" name="reference_id" aria-describedby="prnumberHelp" required/>
											</div>
										</div>
									</div>	
						
									{{--Particulars--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectProcesstype">Particulars</label>
										<select class="custom-select custom-select-sm" name="pr_descriptions_id" required>
										<option value="">Click to select</option>		
										@foreach ($prdescriptions as $prdescription)	
											<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
											</option>
										@endforeach
										</select>
									</div>
				
									{{--Purpose--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputPurpose">Purpose</label>
										<input type="text" class="form-control form-control-sm" id="inputPurpose" name="description" aria-describedby="purposeHelp">
									</div>	
				
									{{--Purchase Request  Estimated Amount--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputEstamount">Approved Budget for the Contract</label>
										<input type="text" class="form-control form-control-sm" id="MoneyLabel" name="est_amount" aria-describedby="estamountHelp" required>
									</div>
								</div>
								{{-- end purchase request --}}

								{{-- Purchase Order --}}
								<div class="selectTypePODR" id="PODR" style="display: none;">

									{{-- Purchase Order Reference ID --}}
									<input type="hidden" name="trigger" value="2">
									<div class="js-form-message form-group">
										<label class="input-label" for="inputReferenceIdVoucher">Purchase Order Reference No.</label>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-3">
													<label for="inputEstamount"><small><i>Fixed Input</i></small></label>
													<input type="text" class="form-control form-control-sm" id="inputPrnumber" name="po" aria-describedby="prnumberHelp" value="PO" readonly>
												</div>
												<div class="col-sm-9">
													<label for="inputEstamount"><small><i>Reference No.</i></small></label>
													<input type="text" class="form-control form-control-sm" id="inputPrnumber" name="reference_id" aria-describedby="prnumberHelp" required>
												</div>
											</div>
										</div>	
									</div>
									
									{{-- Reference ID --}}
									<div class="js-form-message form-group">
										<div class="form-group">
											<label class="input-label" for="inputEstamount">Sub Reference No.</label>
											<div class="row">
												<div class="col-sm-4">
													<label for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
													<select class="custom-select custom-select-sm" name="fund" required>
														<option value="">Select Fund</option>
														<option value="GF">General Fund</option>
														<option value="TF">Trust Fund</option>
														<option value="SEF">Special Education Fund</option>		
													</select>
												</div>
												<div class="col-sm-8">
													<label for="inputEstamount"><small><i>Reference No.</i></small></label>
													<input type="text" class="form-control form-control-sm" id="inputPrnumber" name="sub_reference_id" aria-describedby="prnumberHelp" required>
												</div>
											</div>
										</div>	
									</div>

									{{--Office--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectOffice">Office</label>
										<select class="custom-select custom-select-sm" name="offices_id"  required>
										<option value="">Click to select</option>		
										@foreach ($offices as $office)					
											<option value="{{$office->id}}"> {{ $office->name}}
											</option>
										@endforeach
										</select>
									</div>

									{{--Purchase Request Description--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectProcesstype">Particulars</label>
										<select class="custom-select custom-select-sm" name="pr_descriptions_id" required>
										<option value="">Click to select</option>		
										@foreach ($prdescriptions as $prdescription)	
											<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
											</option>
										@endforeach
										</select>
									</div>

									{{--Purpose--}}
									<div class="js-form-message form-groupp">
										<label class="input-label" for="inputPurpose">Purpose</label>
										<input type="text" class="form-control form-control-sm" id="inputPurpose" name="description" aria-describedby="purposeHelp">
									</div>	<br>

									{{-- Contract Price --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputEstamount">Contract Price</label>
										<input type="text" class="form-control form-control-sm" id="MoneyLabel" name="est_amount" aria-describedby="estamountHelp" required>
									</div>

									{{-- Supplier --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="supplier">Supplier</label>												
										<input id="GSOsupplier" type="text" name="supplier" class="form-control form-control-sm">
									</div>

									{{-- Address --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="supplier_address">Supplier Address</label>												
										<input id="supplier_address" type="text" name="supplier_address" class="form-control form-control-sm">
									</div>
								</div>
								{{-- end purchase order --}}

								{{-- voucher --}}
								<div class="selectTypeVCR" id="VCR" style="display: none;">
									<input type="hidden" name="trigger" value="3">
									{{-- Voucher Reference ID --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputReferenceIdVoucher">Voucher Reference No.</label>
										<input type="text" class="form-control form-control-sm" id="inputReferenceIdVoucher" name="reference_id" aria-describedby="prnumberHelp" required>
									</div>
									
									{{-- Reference ID --}}
									<div class="js-form-message form-group">
										<div class="form-group">
											<div class="form-group">
												<label class="input-label" for="inputEstamount">Sub Reference No.</label>
												<div class="row">
													<div class="col-sm-4">
														<label class="input-label" for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
														<select class="custom-select custom-select-sm" name="fund" required>
															<option value="">Select Fund</option>
															<option value="GF">General Fund</option>
															<option value="TF">Trust Fund</option>
															<option value="SEF">Special Education Fund</option>		
														</select>
													</div>
													<div class="col-sm-8">
														<label class="input-label" for="inputEstamount"><small><i>Reference No.</i></small></label>
														<input type="text" class="form-control form-control-sm" id="inputPrnumber" name="sub_reference_id" aria-describedby="prnumberHelp" required>
													</div>
												</div>
											</div>	
										</div>
									</div>

									{{--Office--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectOffice">Office</label>
										<select class="custom-select custom-select-sm" name="offices_id"  required>
										<option value="">Click to select</option>		
										@foreach ($offices as $office)					
											<option value="{{$office->id}}"> {{ $office->name}}
											</option>
										@endforeach
										</select>
									</div>

									{{--Purchase Request Description--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="selectProcesstype">Particulars</label>
										<select class="custom-select custom-select-sm" name="pr_descriptions_id" required>
										<option value="">Click to select</option>		
										@foreach ($prdescriptions as $prdescription)	
											<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
											</option>
										@endforeach
										</select>
									</div>

									{{--Purpose--}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputPurpose">Purpose</label>
										<input type="text" class="form-control form-control-sm" id="inputPurpose" name="description" aria-describedby="purposeHelp">
									</div>	

									{{-- Beneficiary --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="supplier">Payee</label>												
										<input id="VCRsupplier" type="text" name="supplier" class="form-control form-control-sm">
									</div>

									{{-- Classification???? --}}

									{{-- amount --}}
									<div class="js-form-message form-group">
										<label class="input-label" for="inputEstamount">Amount</label>
										<input type="text" class="form-control form-control-sm" id="MoneyLabel" name="est_amount" aria-describedby="estamountHelp" required>
									</div>
								</div>
								{{-- end voucher --}}

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Card -->

		<!-- Table -->
			{{-- <div class="table-responsive datatable-custom">
				<table id="datatableWithPagination" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
					"order": [],
					"isShowPaging": false,
             		"pagination": "datatableWithPaginationPagination",
					"processing": true,
					"serverSide": true,
					"deferRender": true,
					"pagination": "datatableWithPaginationPagination",
					"ajax": "/create/transaction",
					"columns": [
						{ "data": "reference_id", "name": "reference_id" },
						{ "data": "process_types.name", "name": "process_types.name" },
						{ "data": "client", "name": "client" },
						{ "data": "description", "name": "description" },
						{ "data": "status", "name": "status" },
						{ "data": "action", "name": "action" }
					]
				  }'>
					<thead class="thead-light">
						<tr>
							<th>Ref. #</th>
							<th>Process</th>
							<th>Client</th>
							<th>Description</th>
							<th>Status</th>
							<th align="center">Action</th>
						</tr>
						<tr>
							<th>
								<input type="text" id="colsearch1" class="form-control form-control-sm" placeholder="Search reference #">
							</th>
							<th>
								<select id="colsearch2" class="js-select2-custom"
										data-hs-select2-options='{
										 	"minimumResultsForSearch": "Infinity",
										  	"customClass": "custom-select custom-select-sm text-capitalize",
										  	"dropdownAutoWidth": true,
                      						"width": true
										}'>
								  	<option value="">Any</option>
								 	 <option value="Purchase Request">Purchase Request</option>
								 	<option value="Purchase Order">Purchase Order</option>
								  	<option value="Voucher">Voucher</option>
								</select>
							</th>
							<th>
								<input type="text" id="colsearch3" class="form-control form-control-sm" placeholder="Search client">
							</th>
							<th>
								<input type="text" id="colsearch4" class="form-control form-control-sm" placeholder="Search description">
							</th>
							<th>
								<select id="colsearch5" class="js-select2-custom"
										data-hs-select2-options='{
											"minimumResultsForSearch": "Infinity",
											"customClass": "custom-select custom-select-sm text-capitalize",
											"dropdownAutoWidth": true,
											"width": true
										}'>
								  	<option value="">Any</option>
								 	<option value="In Progress">In Progress</option>
								 	<option value="Cancelled">Cancelled</option>
								  	<option value="Completed">Completed</option>
								</select>
							</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div> --}}
		<!-- End Table -->
		<!-- Card -->
		<div class="card">
			<!-- Header -->
			<div class="card-header">
			<div class="row justify-content-between align-items-center flex-grow-1">
				<div class="col-12 col-md">
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-header-title">Users</h5>
						 <!-- Unfold -->
						<div class="hs-unfold">
							<a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary rounded-circle" href="javascript:;"
							data-hs-unfold-options='{
								"target": "#showHideDropdown",
								"type": "css-animation"
							}'>
							<i class="tio-table"></i>
							</a>
					
							<div id="showHideDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right dropdown-card" style="width: 15rem;">
							<div class="card card-sm">
								<div class="card-body">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<span class="mr-2">Country</span>
					
									<!-- Checkbox Switch -->
									<label class="toggle-switch toggle-switch-sm" for="toggleColumn_country">
									<input type="checkbox" class="toggle-switch-input" id="toggleColumn_country" checked>
									<span class="toggle-switch-label">
										<span class="toggle-switch-indicator"></span>
									</span>
									</label>
									<!-- End Checkbox Switch -->
								</div>
					
								<div class="d-flex justify-content-between align-items-center mb-3">
									<span class="mr-2">Position</span>
					
									<!-- Checkbox Switch -->
									<label class="toggle-switch toggle-switch-sm" for="toggleColumn_position">
									<input type="checkbox" class="toggle-switch-input" id="toggleColumn_position" checked>
									<span class="toggle-switch-label">
										<span class="toggle-switch-indicator"></span>
									</span>
									</label>
									<!-- End Checkbox Switch -->
								</div>
					
								<div class="d-flex justify-content-between align-items-center">
									<span class="mr-2">Status</span>
					
									<!-- Checkbox Switch -->
									<label class="toggle-switch toggle-switch-sm" for="toggleColumn_status">
									<input type="checkbox" class="toggle-switch-input" id="toggleColumn_status" checked>
									<span class="toggle-switch-label">
										<span class="toggle-switch-indicator"></span>
									</span>
									</label>
									<!-- End Checkbox Switch -->
								</div>
								</div>
							</div>
							</div>
						</div>
						<!-- End Unfold -->
					</div>
				</div>
		
				<div class="col-auto">
				<!-- Filter -->
				<form>
					<!-- Search -->
					<div class="input-group input-group-merge input-group-flush">
					<div class="input-group-prepend">
						<div class="input-group-text">
						<i class="tio-search"></i>
						</div>
					</div>
					<input id="datatableWithSearchInput" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
					</div>
					<!-- End Search -->
				</form>
				<!-- End Filter -->
				</div>
			</div>
			</div>
			<!-- End Header -->
		
			<!-- Table -->
			<div class="table-responsive datatable-custom">
			<table id="datatableWithSearch" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
					data-hs-datatables-options='{
					"order": [],
					"search": "#datatableWithSearchInput",
					"isResponsive": false,
					"isShowPaging": false,
					"pagination": "datatableWithSearch"
					}'>
				<thead class="thead-light">
				<tr>
					<th>Name</th>
					<th>Position</th>
					<th>Country</th>
					<th>Status</th>
				</tr>
				</thead>
		
				<tbody>
					<tr>
						<td>
						  <a class="media align-items-center" href="../user-profile.html">
							<div class="avatar avatar-circle mr-3">
							  <img class="avatar-img" src="{{ asset('img/160x160/img10.jpg') }}" alt="Image Description">
							</div>
							<div class="media-body">
							  <span class="d-block h5 text-hover-primary mb-0">Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></span>
							  <span class="d-block font-size-sm text-body">amanda@example.com</span>
							</div>
						  </a>
						</td>
						<td>
						  <span class="d-block h5 mb-0">Director</span>
						  <span class="d-block font-size-sm">Human resources</span>
						</td>
						<td>United Kingdom <span class="text-hide">Code: GB</span></td>
						<td>
						  <span class="legend-indicator bg-success"></span>Active
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			<!-- End Table -->
		
			<!-- Footer -->
			<div class="card-footer">
			<!-- Pagination -->
			<div class="d-flex justify-content-center justify-content-sm-end">
				<nav id="datatableWithSearch" aria-label="Activity pagination"></nav>
			</div>
			<!-- End Pagination -->
			</div>
			<!-- End Footer -->
		</div>
		<!-- End Card -->
		
		<br><br>
	</div>
@endsection
@section('script')
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

	<script>
		$(document).on('ready', function () {
		// initialization of datatables
		var datatable = $.HSCore.components.HSDatatables.init($('#datatableWithSearch'));
	
		$('#toggleColumn_position').change(function (e) {
			datatableSortingColumn.columns(1).visible(e.target.checked)
		})
	
		$('#toggleColumn_country').change(function (e) {
			datatable.columns(2).visible(e.target.checked)
		})
	
		$('#toggleColumn_status').change(function (e) {
			datatableSortingColumn.columns(3).visible(e.target.checked)
		})
		});
  	</script>

	<script>
		function disableFunction() {
			$('#btnverzenden').prop('disabled', true);
		}
	</script>

	<script>
		$(document).on('ready', function () {
			// initialization of datatables
			var datatable = $.HSCore.components.HSDatatables.init($('#datatableWithPagination'));
			
			$('#colsearch1').on( 'keyup', function () {
			datatable
				.columns( 0 )
				.search( this.value )
				.draw();
			} );

			$('#colsearch2').on( 'change', function () {
			datatable
				.columns( 1 )
				.search( this.value )
				.draw();
			} );


			$('#colsearch3').on( 'keyup', function () {
			datatable
				.columns( 2 )
				.search( this.value )
				.draw();
			} );

			$('#colsearch4').on( 'keyup', function () {
			datatable
				.columns( 3 )
				.search( this.value )
				.draw();
			} );

			$('#colsearch5').on( 'change', function () {
			datatable
				.columns( 4 )
				.search( this.value )
				.draw();
			} );


			// initialization of select2
			$('.js-select2-custom').each(function () {
				var select2 = $.HSCore.components.HSSelect2.init($(this));
			});
		});
	</script>

	
	<script>
		function setTwoNumberDecimal(event) {
			this.value = parseFloat(this.value).toFixed(2);
		}
	</script>

	<script>
		$(document).ready(function(){
		    $('#process_selector').on('change', function() {
		    	if ( this.value == '0')
			    {
			        $("#PR").hide();
					$("#PODR").hide();	
					$("#VCR").hide();
			    }
		      	//If red is selected, show red, hide yellow and blue.
		      	if ( this.value == '1')
		      	{
		        	$("#PR").show();
					$("#PR :input").prop("disabled", false);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
		      	}
		      
		       //If yellow is selected, show yellow, hide red and blue.
			    if ( this.value == '2')
			    {
			        $("#PR").hide();
					$("#PR :input").prop("disabled", true);
					$("#PODR").show();
					$("#PODR :input").prop("disabled", false);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
			    }

				if ( this.value == '3')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);
					$("#VCR").show();
					$("#VCR :input").prop("disabled", false);
			    }
		    });
		});
	</script>
@endsection


