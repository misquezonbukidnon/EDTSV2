@extends('layouts.app')
@section('content')
	<style>
		.text-wrap{
		white-space:normal;
		}
		.width-200{
			width:200px;
		}
	</style>
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
		<!-- Card -->
		<div class="card">
			<!-- Header -->
			<div class="card-header">
			<div class="row justify-content-between align-items-center flex-grow-1">
				<div class="col-12 col-md">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-header-title">Users</h5>
				</div>
				</div>
		
				<div class="col-md-auto">
				<!-- Filter -->
				<div class="row align-items-center">
					<div class="col-auto">
					<!-- Select -->
					<select id="resOffice" class="js-select2-custom"
						{{-- data-target-column-index="1" --}}
						data-hs-select2-options='{
						"minimumResultsForSearch": "Infinity",
						"customClass": "custom-select custom-select-sm",
						"dropdownAutoWidth": true,
						"width": true
						}'>
						<option value="">Select Office</option>
						@foreach ($offices as $data)
							<option value="{{ $data->abbr }}">{{ $data->name }}</option>
						@endforeach
					</select>
				<!-- End Select -->
					<!-- Select -->
					<select id="resClassification" class="js-select2-custom"
							{{-- data-target-column-index="1" --}}
							data-hs-select2-options='{
							"minimumResultsForSearch": "Infinity",
							"customClass": "custom-select custom-select-sm",
							"dropdownAutoWidth": true,
							"width": true
							}'>
						<option value="">Classification</option>
						<option value="Purchase Request">Purchase Request</option>
						<option value="Purchase Order">Purchase Order</option>
						<option value="Voucher">Voucher</option>
					</select>
					<!-- End Select -->
					<!-- Select -->
					<select id="resStatus" class="js-select2-custom"
							{{-- data-target-column-index="4" --}}
							data-hs-select2-options='{
							"minimumResultsForSearch": "Infinity",
							"customClass": "custom-select custom-select-sm",
							"dropdownAutoWidth": true,
							"width": true
							}'>
						<option value="">Stataus</option>
						<option value="In Progress">In Progress</option>
						<option value="Completed">Completed</option>
						<option value="Cancelled">Cancelled</option>
					</select>
					<!-- End Select -->
					</div>
		
					<div class="col">
					<form>
						<!-- Search -->
						<div class="input-group input-group-merge input-group-flush">
						<div class="input-group-prepend">
							<div class="input-group-text">
							<i class="tio-search"></i>
							</div>
						</div>
						<input id="datatableWithFilterSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
						</div>
						<!-- End Search -->
					</form>
					</div>
				</div>
				<!-- End Filter -->
				</div>
			</div>
			</div>
			<!-- End Header -->
		
			<!-- Table -->
			<div class="table-responsive datatable-custom">
				{{-- DataTable Server-Side - To be fixed --}}
				{{-- <table id="recordsDataTable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
						data-hs-datatables-options='{
						"order": [],
						"search": "#datatableWithFilterSearch",
						"isResponsive": false,
						"isShowPaging": false,
						"pagination": "datatableWithFilterPagination",
						"serverSide": true,
						"processing": true,
						"ajax": "/create/transaction",
						"columns": [
							{ "data": "reference_id", "name": "reference_id", "orderable": true, "searchable": true },
							{ "data": "process_types.name", "name": "process_types.name", "orderable": true, "searchable": true },
							{ "data": "client", "name": "client", "orderable": true, "searchable": true },
							{ "data": "description", "name": "description", "orderable": true, "searchable": true },
							{ "data": "status", "name": "status", "orderable": true, "searchable": true },
							{ "data": "action", "name": "action", "orderable": true, "searchable": true }
						]
						}'>
					<thead class="thead-light">
					<tr>
						<th>Reference #</th>
						<th>Classification</th>
						<th>Client</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
			
					<tbody>
					</tbody>
				</table> --}}
				<table id="recordsDataTable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
						data-hs-datatables-options='{
						"order": [],
						"search": "#datatableWithFilterSearch",
						"isResponsive": false,
						"isShowPaging": false,
						"pagination": "datatableWithFilterPagination",
						"scrollX": true,
						"scrollCollapse": true,
						"autoWidth": true,
						"fixedColumns": true,  
						"columnDefs": [
							{ "width": "150px", "targets": [0,1] },       
							{ "width": "40px", "targets": [3] }
						]
						}'>
					<thead class="thead-light">
					<tr>
						<th>Reference #</th>
						<th>Classification</th>
						<th>Client</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
			
					<tbody>
						@foreach($transactions as $data)
							<tr>
								<td>
									<div class="media-body">
										<span class="d-block h5 text-hover-primary mb-0">{{ $data->reference_id }}</span>
										<span class="d-block font-size-sm text-body">{{ $data->users->name }}</span>
									</div>
								</td>
								<td>
									<div class="media-body">
										<span class="d-block h5 text-hover-primary mb-0">{{ $data->process_types->name }}</span>
									</div>
								</td>
								<td>
									<div class="media-body">
										@switch($data->process_types_id)
											@case($data->process_types_id == 1)
												<span class="d-block h5 text-hover-primary mb-0">{{ $data->offices->abbr }}</span>
												@break
											@case($data->process_types_id == 2)
												<span class="d-block h5 text-hover-primary mb-0">{{ $data->client }}</span>
												@break
											@case($data->process_types_id == 3)
												<span class="d-block h5 text-hover-primary mb-0">{{ $data->client }}</span>
												@break
											@default
												<p>Please contact administrator</p>
										@endswitch
									</div>
								</td>
								<td>
									<div class="media-body">
										<span class="d-block h5 text-hover-primary mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
									</div>
								</td>
								<td>
									<div class="media-body">
										@switch($data->statuses->name)
											@case($data->statuses->name == "Complete")
												<span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-success"></span>{{ $data->statuses->name }}</span>
												@break
											@case($data->statuses->name == "In Progress")
												<span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-primary"></span>{{ $data->statuses->name }}</span>
												@break
											@case($data->statuses->name == "Cancelled")
												<span class="d-block h5 text-hover-primary mb-0"><span class="legend-indicator bg-danger"></span>{{ $data->statuses->name }}</span>
												@break
											@default
												<p>Please contact administrator</p>
										@endswitch
									</div>
								</td>
								<td>
									<a href="/find/records/{{ $data->id }}" class="btn btn-xs btn-outline-primary"><i class="tio-zoom_in tio-lg">zoom_in</i></a>
									<a href="/edit/transaction/{{ $data->id }}" class="btn btn-xs btn-outline-primary"><i class="tio-edit tio-lg"></i></a>
									<a href="/barcode/transaction/{{ $data->id }}" class="btn btn-xs btn-outline-primary"><i class="tio-barcode tio-lg"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- End Table -->
		
			<!-- Footer -->
			<div class="card-footer">
			<!-- Pagination -->
			<div class="d-flex justify-content-center justify-content-sm-end">
				<nav id="datatableWithFilterPagination" aria-label="Activity pagination"></nav>
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

	{{-- DataTable --}}
	<script>
		$(document).on('ready', function () {
			// initialization of datatables
			var datatable = $.HSCore.components.HSDatatables.init($('#recordsDataTable'));

			// $.fn.dataTable.ext.errMode = 'throw';
			$('#resOffice').on( 'change', function () {
				datatable
					.columns( 2 )
					.search( this.value )
					.draw();
			} );
			
			$('#resClassification').on( 'change', function () {
				datatable
					.columns( 1 )
					.search( this.value )
					.draw();
			} );

			$('#resStatus').on( 'change', function () {
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
	{{-- End DataTable --}}
	


	<script>
		function disableFunction() {
			$('#btnverzenden').prop('disabled', true);
		}
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


