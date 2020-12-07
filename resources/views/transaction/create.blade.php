@extends('layouts.app')
<style>
	.text-wrap{
    white-space:normal;
	}
	.width-200{
		width:200px;
	}
</style>
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="{{ url('/store/transaction') }}" method ="POST" id="transaction_form" onSubmit='disableFunction()'>
			@csrf
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5">
						<div class="grid">
							<div class="grid-header">Transaction Registration</div>
							<div class="grid-body">
								<div class="item-wrapper">

									{{--Date of Entry--}}
									<div class="form-group">
										<label for="inputDOE">Date of Entry</label>
										<input type="date" class="form-control" id="inputDOE" name="date_of_entry" aria-describedby="doeHelp" placeholder="Date of Entry" required>
										<small id="docHelp" class="form-text text-muted">Please enter the date of entry.</small>
									</div>	

									{{-- Status Transaction	 --}}
									<input type="hidden" id="statid" name="statuses_id" value="2">
									{{-- <button disabled class="btn btn-outline-primary" type=button id="btnverzenden2" style="display: none"><span class="glyphicon glyphicon-refresh"></span>Submitting</button>    --}}
									<button class="btn btn-outline-primary" type=submit name=verzenden id="btnverzenden">Submit</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
				        <div class="grid">
				        	<div class="grid-header">Information</div>
				          	<div class="grid-body">
					            <div class="item-wrapper">

					            	<div class="form-group">
										<label for="selectOffice">Select Process</label>
										<select class="custom-select" name="process_type" id="process_selector" required>
										<option value="">Click to select</option>		
										{{-- @foreach ($processtypes as $process)					
											<option value="{{$process->id}}"> {{ $process->name}}
											</option>
										@endforeach --}}
										<option value="1">Purchase Request</option>
										<option value="8">Voucher</option>
										<option value="9">Purchase Order</option>
										</select>
										<small id="officeHelp" class="form-text text-muted">Please select office.</small>
									</div>


									{{-- Purchase Request --}}
									<div class="selectTypePR" id="PR" style="display: none;">
										<input type="hidden" name="trigger" value="1">
										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>

										{{--Reference No.--}}
										<div class="form-group">
											<label for="inputEstamount">Reference No.</label>
											<div class="row">
												<div class="col-sm-4">
													<label for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
													<select class="custom-select" name="fund" required>
														<option value="">Select Fund</option>
														<option value="GF">General Fund</option>
														<option value="TF">Trust Fund</option>
														<option value="SEF">Special Education Fund</option>		
													</select>
												</div>
												<div class="col-sm-8">
													<label for="inputEstamount"><small><i>Reference No.</i></small></label>
													<input type="text" class="form-control" id="inputPrnumber" name="reference_id" aria-describedby="prnumberHelp" required>
												</div>
											</div>
											<small id="prnumberHelp" class="form-text text-muted">Please enter PR number.</small>
										</div>	
							
										{{--Particulars--}}
										<div class="form-group">
											<label for="selectProcesstype">Particulars</label>
											<select class="custom-select" name="pr_descriptions_id" required>
											<option value="">Click to select</option>		
											@foreach ($prdescriptions as $prdescription)	
												<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
												</option>
											@endforeach
											</select>
											<small id="processtypeHelp" class="form-text text-muted">Select Particulars.</small>
										</div>

										{{--Purpose--}}
										<div class="form-group">
											<label for="inputPurpose">Purpose</label>
											<input type="text" class="form-control" id="inputPurpose" name="description" aria-describedby="purposeHelp">
											<small id="purposeHelp" class="form-text text-muted">Purchase Request Purpose</small>
										</div>	

										{{--Purchase Request  Estimated Amount--}}
										<div class="form-group">
											<label for="inputEstamount">Approved Budget for the Contract</label>
											<input type="text" class="form-control" id="PRInputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the amount.</small>
										</div>
									</div>
									{{-- End --}}

									{{-- Financial Assistance --}}
									{{-- <div class="selectTypeFA" id="FA" style="display: none;"> --}}

										{{-- Beneficiary --}}
										{{-- <div class="form-group">
											<label for="supplier">Beneficiary</label>												
											<input id="FAsupplier" type="text" name="supplier" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input beneficiary name.</small>
										</div> --}}

										{{-- Address --}}
										{{-- <div class="form-group">
											<label for="supplier_address">Address</label>												
											<input id="FAsupplier_address" type="text" name="supplier_address" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input beneficiary address.</small>
										</div> --}}

										{{--Purchase Request  Estimated Amount--}}
										{{-- <div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="FAInputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter amount.</small>
										</div> --}}

									{{-- </div> --}}
									{{-- End --}}

									{{-- Internet Billing --}}
									<div class="selectTypeIB" id="IB" style="display: none;">
										{{--Office--}}

										{{--Reference ID--}}
										<div class="form-group">
											<label for="inputReferenceIdInternetBilling">Reference No.</label>
											<input type="text" class="form-control" id="inputReferenceIdInternetBilling" name="reference_id" aria-describedby="prnumberHelp" required>
											<small id="prnumberHelp" class="form-text text-muted">Please enter Reference number.</small>
										</div>	

										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>
										{{-- Beneficiary --}}
										<div class="form-group">
											<label for="supplier">Client</label>												
											<input id="IBsupplier" type="text" name="supplier" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input client name.</small>
										</div>

										{{-- Address --}}
										<div class="form-group">
											<label for="supplier_address">Address</label>												
											<input id="IBsupplier_address" type="text" name="supplier_address" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input client address.</small>
										</div>

										{{--Purchase Request  Estimated Amount--}}
										<div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="IBInputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter amount.</small>
										</div>
									</div>
									{{-- End --}}

									{{-- Mobile Allowance --}}
									{{-- <div class="selectTypeMA" id="MA" style="display: none;"> --}}
										{{-- Beneficiary --}}
										{{-- <div class="form-group">
											<label for="supplier">Client</label>												
											<input id="MAsupplier" type="text" name="supplier" value="LGU Group Mobile Allowance" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input client information.</small>
										</div> --}}

										{{--Purchase Request  Estimated Amount--}}
										{{-- <div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="MAnputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the total amount.</small>
										</div> --}}
									{{-- </div> --}}
									{{-- End --}}

									{{-- Monetization of Leave Credits --}}
									{{-- <div class="selectTypeMLC" id="MLC" style="display: none;"> --}}
										{{--Office--}}
										{{-- <div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div> --}}
										{{-- Beneficiary --}}
										{{-- <div class="form-group">
											<label for="supplier">Client</label>												
											<input id="MLCsupplier" type="text" name="supplier" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input client information.</small>
										</div> --}}

										{{--Purchase Request  Estimated Amount--}}
										{{-- <div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="MLCnputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the total amount.</small>
										</div> --}}
									{{-- </div> --}}
									{{-- End --}}

									{{-- Payroll Overtime --}}
									<div class="selectTypePO" id="PO" style="display: none;">

										{{--Reference ID--}}
										<div class="form-group">
											<label for="inputReferenceIdPayrollOvertime">Reference No.</label>
											<input type="text" class="form-control" id="inputReferenceIdPayrollOvertime" name="reference_id" aria-describedby="prnumberHelp" required>
											<small id="prnumberHelp" class="form-text text-muted">Please enter Reference number.</small>
										</div>	

										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>

										{{--Beneficiary--}}
										<div class="form-group">
											<label for="selectOffice">Payroll Employee Status</label>
											<select class="custom-select" name="supplier" required>
											<option value="">Click to select</option>	
											<option value="Regular">Regular</option>	
											<option value="Casual">Casual</option>
											<option value="Job Order">Job Order</option>
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select employee status.</small>
										</div>

										{{--Purchase Request  Estimated Amount--}}
										<div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="POinputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the total amount.</small>
										</div>
									</div>
									{{-- End --}}

									{{-- Payroll Salary --}}
									<div class="selectTypePS" id="PS" style="display: none;">

										{{-- Reference ID --}}
										<div class="form-group">
											<label for="inputReferenceIdPayrollSalary">Reference No.</label>
											<input type="text" class="form-control" id="inputReferenceIdPayrollSalary" name="reference_id" aria-describedby="prnumberHelp" required>
											<small id="prnumberHelp" class="form-text text-muted">Please enter Reference number.</small>
										</div>	

										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>

										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Employee Status</label>
											<select class="custom-select" name="supplier" required>
											<option value="">Click to select</option>	
											<option value="Regular">Regular</option>	
											<option value="Casual">Casual</option>
											<option value="Job Order">Job Order</option>
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select employee status.</small>
										</div>

										{{--Purchase Request  Estimated Amount--}}
										<div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="PSinputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the total amount.</small>
										</div>
									</div>
									{{-- End --}}

									{{-- Voucher --}}
									<div class="selectTypeVCR" id="VCR" style="display: none;">
										<input type="hidden" name="trigger" value="3">
										{{-- Voucher Reference ID --}}
										<div class="form-group">
											<label for="inputReferenceIdVoucher">Voucher Reference No.</label>
											<input type="text" class="form-control" id="inputReferenceIdVoucher" name="reference_id" aria-describedby="prnumberHelp" required>
											<small id="voucherHelp" class="form-text text-muted">Please enter Reference number.</small>
										</div>
										
										{{-- Reference ID --}}
										<div class="form-group">
											<div class="form-group">
												<div class="form-group">
													<label for="inputEstamount">Sub Reference No.</label>
													<div class="row">
														<div class="col-sm-4">
															<label for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
															<select class="custom-select" name="fund" required>
																<option value="">Select Fund</option>
																<option value="GF">General Fund</option>
																<option value="TF">Trust Fund</option>
																<option value="SEF">Special Education Fund</option>		
															</select>
														</div>
														<div class="col-sm-8">
															<label for="inputEstamount"><small><i>Reference No.</i></small></label>
															<input type="text" class="form-control" id="inputPrnumber" name="sub_reference_id" aria-describedby="prnumberHelp" required>
														</div>
													</div>
												</div>	
												<small id="referenceIdMainHelp" class="form-text text-muted">Please enter main Reference number.</small>
											</div>
										</div>

										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>

										{{--Purchase Request Description--}}
										<div class="form-group">
											<label for="selectProcesstype">Particulars</label>
											<select class="custom-select" name="pr_descriptions_id" required>
											<option value="">Click to select</option>		
											@foreach ($prdescriptions as $prdescription)	
												<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
												</option>
											@endforeach
											</select>
											<small id="processtypeHelp" class="form-text text-muted">Select Particulars.</small>
										</div>

										{{--Purpose--}}
										<div class="form-group">
											<label for="inputPurpose">Purpose</label>
											<input type="text" class="form-control" id="inputPurpose" name="description" aria-describedby="purposeHelp">
											<small id="purposeHelp" class="form-text text-muted">Purchase Request Purpose</small>
										</div>	

										{{-- Beneficiary --}}
										<div class="form-group">
											<label for="supplier">Payee</label>												
											<input id="VCRsupplier" type="text" name="supplier" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input Payee name.</small>
										</div>

										{{-- Classification???? --}}

										{{--Purchase Request  Estimated Amount--}}
										<div class="form-group">
											<label for="inputEstamount">Amount</label>
											<input type="text" class="form-control" id="PSinputEstamount" name="est_amount" aria-describedby="estamountHelp" required>
											<small id="estamountHelp" class="form-text text-muted">Please enter the total amount.</small>
										</div>
									</div>
									{{-- End --}}

									{{-- Purchase Order --}}
									<div class="selectTypePODR" id="PODR" style="display: none;">

										{{-- Purchase Order Reference ID --}}
										<input type="hidden" name="trigger" value="2">
										<div class="form-group">
											<label for="inputReferenceIdVoucher">Purchase Order Reference No.</label>
											<div class="form-group">
												<div class="row">
													<div class="col-sm-3">
														<label for="inputEstamount"><small><i>Fixed Input</i></small></label>
														<input type="text" class="form-control" id="inputPrnumber" name="po" aria-describedby="prnumberHelp" value="PO" readonly>
													</div>
													<div class="col-sm-9">
														<label for="inputEstamount"><small><i>Reference No.</i></small></label>
														<input type="text" class="form-control" id="inputPrnumber" name="reference_id" aria-describedby="prnumberHelp" required>
													</div>
												</div>
											</div>	
											<small id="voucherHelp" class="form-text text-muted">Please enter Reference number.</small>
										</div>
										
										{{-- Reference ID --}}
										<div class="form-group">
											<div class="form-group">
												<label for="inputEstamount">Sub Reference No.</label>
												<div class="row">
													<div class="col-sm-4">
														<label for="inputEstamount"><small><i>Select Fund Type.</i></small></label>
														<select class="custom-select" name="fund" required>
															<option value="">Select Fund</option>
															<option value="GF">General Fund</option>
															<option value="TF">Trust Fund</option>
															<option value="SEF">Special Education Fund</option>		
														</select>
													</div>
													<div class="col-sm-8">
														<label for="inputEstamount"><small><i>Reference No.</i></small></label>
														<input type="text" class="form-control" id="inputPrnumber" name="sub_reference_id" aria-describedby="prnumberHelp" required>
													</div>
												</div>
											</div>	
											<small id="referenceIdMainHelp" class="form-text text-muted">Please enter main Reference number.</small>
										</div>

										{{--Office--}}
										<div class="form-group">
											<label for="selectOffice">Office</label>
											<select class="custom-select" name="offices_id"  required>
											<option value="">Click to select</option>		
											@foreach ($offices as $office)					
												<option value="{{$office->id}}"> {{ $office->name}}
												</option>
											@endforeach
											</select>
											<small id="officeHelp" class="form-text text-muted">Please select office.</small>
										</div>

										{{--Purchase Request Description--}}
										<div class="form-group">
											<label for="selectProcesstype">Particulars</label>
											<select class="custom-select" name="pr_descriptions_id" required>
											<option value="">Click to select</option>		
											@foreach ($prdescriptions as $prdescription)	
												<option value="{{$prdescription->id}}"> {{ $prdescription->name}}
												</option>
											@endforeach
											</select>
											<small id="processtypeHelp" class="form-text text-muted">Select Particulars.</small>
										</div>

										{{--Purpose--}}
										<div class="form-group">
											<label for="inputPurpose">Purpose</label>
											<input type="text" class="form-control" id="inputPurpose" name="description" aria-describedby="purposeHelp">
											<small id="purposeHelp" class="form-text text-muted">Purchase Request Purpose</small>
										</div>	

										{{-- Contract Price --}}
										<div class="form-group">
											<label for="amount">Contract Price</label>												
											<input id="amount" type="text" name="est_amount" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input contract Price.</small>
										</div>

										{{-- Supplier --}}
										<div class="form-group">
											<label for="supplier">Supplier</label>												
											<input id="GSOsupplier" type="text" name="supplier" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input supplier name.</small>
										</div>

										{{-- Address --}}
										<div class="form-group">
											<label for="supplier_address">Supplier Address</label>												
											<input id="supplier_address" type="text" name="supplier_address" class="form-control">
											<small id="rofficeHelp" class="form-text text-muted">Please input supplier address.</small>
										</div>
									</div>
									{{-- End --}}
								</div>
					        </div>
				        </div>
        			</div>
				</div>
			</div>			
        	<div class="grid">
				<div class="grid-header">Registered Transactions</div>
				<div class="grid-body">
					<div class="item-wrapper">
						<div class="table-responsive">
							<table id="transactions-data-table" class="table table-bordered table-condensed" width="100%">
								<thead>
									<tr>
										<th>Ref. #</th>
										<th>Process</th>
										<th>Client</th>
										<th>Description</th>
										<th>Status</th>
										<th align="center">Action</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>
										<th>Ref. #</th>
										<th>Process</th>
										<th>Client</th>
										<th>Description</th>
										<th>Status</th>
										<th align="center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>    
		</form>
	</div>
@endsection
@section('script')
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

	{{-- <script>
		$(function() {
		    $('#transactions-data-table').DataTable(function(){
				responsive: true
			});
		});
	</script> --}}

	<script>
		// $(function(){
		// 	$("#btnverzenden").click(function () {
		// 		$("#btnverzenden").hide(); 
		// 		$("#btnverzenden2").show(); 
		// 	});
		// });

		function disableFunction() {
			$('#btnverzenden').prop('disabled', true);
		}
	</script>

	<script>
		$(function() {
		    $('#transactions-data-table').DataTable({
		        processing: true,
		        serverSide: true,
				deferRender: true,
		        ajax: '/create/transaction',
		        columns: [
		        	{ data: 'reference_id', name: 'reference_id'},
					{ data: 'process_types.name', name: 'process_types.name'},
                    { data: 'client', name: 'client' },
					{ data: 'description', name: 'description' },
                    { data: 'status', name: 'status' },
		            { data: 'action', name: 'action'}
		        ],
				columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 2
                },
				{
					render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 3,
				}	
				]
		    });
			$('div.dataTables_filter input').focus()
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
			        $("#FA").hide();
					$("#IB").hide();
					$("#MA").hide();
					$("#MLC").hide();
					$("#PO").hide();
					$("#PS").hide();
					$("#VCR").hide();
					$("#PODR").hide();	
			    }
		      	//If red is selected, show red, hide yellow and blue.
		      	if ( this.value == '1')
		      	{
		        	$("#PR").show();
					$("#PR :input").prop("disabled", false);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);
		      	}
		      
		       //If yellow is selected, show yellow, hide red and blue.
			    if ( this.value == '2')
			    {
			        $("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").show();  
					$("#FA :input").prop("disabled", false);
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);
			    }

				if ( this.value == '3')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").show();
					$("#IB :input").prop("disabled", false);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '4')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").show();
					$("#MA :input").prop("disabled", false);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '5')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").show();
					$("#MLC :input").prop("disabled", false);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '6')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").show();
					$("#PO :input").prop("disabled", false);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '7')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").show();
					$("#PS :input").prop("disabled", false);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '8')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").show();
					$("#VCR :input").prop("disabled", false);
					$("#PODR").hide();
					$("#PODR :input").prop("disabled", true);

			    }

				if ( this.value == '9')
			    {
					$("#PR").hide();
					$("#PR :input").prop("disabled", true);
			        $("#FA").hide();
					$("#FA :input").prop("disabled", true);   
					$("#IB").hide();
					$("#IB :input").prop("disabled", true);
					$("#MA").hide();
					$("#MA :input").prop("disabled", true);
					$("#MLC").hide();
					$("#MLC :input").prop("disabled", true);
					$("#PO").hide();
					$("#PO :input").prop("disabled", true);
					$("#PS").hide();
					$("#PS :input").prop("disabled", true);
					$("#VCR").hide();
					$("#VCR :input").prop("disabled", true);
					$("#PODR").show();
					$("#PODR :input").prop("disabled", false);

			    }
		    });
		});
	</script>
@endsection
