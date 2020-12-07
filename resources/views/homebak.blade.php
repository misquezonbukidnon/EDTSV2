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
    <div class="col-md-12">
        <div class="row">

			{{-- Modal --}}

			{{-- MBO PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mbo-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mbo-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mbo_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MBO PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mbo-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mbo-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mbo_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MBO VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mbo-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mbo-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mbo_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MMO PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mmo-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mmo-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mmo_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MMO PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mmo-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mmo-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mmo_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MMO VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mmo-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mmo-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mmo_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- BAC PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-bac-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-bac-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($bac_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- BAC PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-bac-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-bac-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($bac_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- BAC VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-bac-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-bac-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($bac_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- PROC PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-proc-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-proc-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($proc_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- PROC PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-proc-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-proc-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($proc_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- PROC VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-proc-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-proc-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($proc_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- GSO PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-gso-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-gso-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($gso_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- GSO PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-gso-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-gso-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($gso_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- GSO VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-gso-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-gso-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($gso_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MACCO PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-macco-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-macco-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($macco_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MACCO PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-macco-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-macco-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($macco_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MACCO VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-macco-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-macco-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($macco_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MTO PR MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mto-pr" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mto-pr" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Description</th>
												<th>ABC Amount</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mto_pr_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td width="50%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MTO PO MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mto-po" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mto-po" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Supplier</th>
												<th>Address</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mto_po_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td width="30%;"><div class="text-wrap" style="width: 100%;">{{ $data->address }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- MTO VOUCHER MODAL --}}
			<div class="col-md-12">
				<div class="modal fade" id="get-modal-data-mto-voucher" tabindex="-1" role="dialog" aria-modal="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content" style="width:150%; margin-left: -20%;">
							<div class="modal-header">
								<p class="card-title ml-n1">Details</p>
							</div>
							<div class="modal-body">
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" id="modal-table-mto-voucher" width="100%">
										<thead>
											<tr>
												<th>Date Started</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Description</th>
												<th>Payee</th>
												<th>Contract Price</th>
												<th>Days Pending</th>
												<th class="w-10">TDIP</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($mto_voucher_res as $data)
												<tr>
													<td>{{ $data->date_of_entry }}</td>
													<td>{{ $data->reference_id }}</td>
													<td>{{ $data->sub_reference_id }}</td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->description }}</div></td>
													<td width="40%;"><div class="text-wrap" style="width: 100%;">{{ $data->client }}</div></td>
													<td>{{ number_format($data->amount, 2, '.', ',') }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->updated_at)->diffInDays() }}</td>
													<td>{{ $diff = Carbon\Carbon::parse($data->created_at)->diffInDays() }}</td>
												</tr>
											@endforeach
										</tbody>
	
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if (auth()->user())
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							{{-- <div class="row">
								<div class="col-6 equel-grid">
								<div class="grid d-flex flex-column align-items-center justify-content-center">
									<div class="grid-body text-center">
										<div class="profile-img img-rounded bg-inverse-primary no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-file-document mdi-2x"></i></div>
										<h2 class="font-weight-medium"><span class="animated-count">{{ $pendings }}</span></h2>
										<small class="text-gray d-block mt-3">Pending Documents</small>
									</div>
								</div>
								</div>
								<div class="col-6 equel-grid">
								<div class="grid d-flex flex-column align-items-center justify-content-center">
									<div class="grid-body text-center">
										<div class="profile-img img-rounded bg-inverse-danger no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-alert-decagram mdi-2x"></i></div>
										<h2 class="font-weight-medium"><span class="animated-count">{{ $cancelled }}</span></h2>
										<small class="text-gray d-block mt-3">Cancelled Documents</small>
									</div>
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6 equel-grid">
								<div class="grid d-flex flex-column align-items-center justify-content-center">
									<div class="grid-body text-center">
										<div class="profile-img img-rounded bg-inverse-warning no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-tooltip-edit mdi-2x"></i></div>
										<h2 class="font-weight-medium animated-count">{{ $onprocess }}</h2>
										<small class="text-gray d-block mt-3">On process Documents</small>
									</div>
								</div>
								</div>
								<div class="col-6 equel-grid">
								<div class="grid d-flex flex-column align-items-center justify-content-center">
									<div class="grid-body text-center">
										<div class="profile-img img-rounded bg-inverse-success no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-check-circle mdi-2x"></i></div>
										<h2 class="font-weight-medium"><span class="animated-count">{{ $completed }}</span></h2>
										<small class="text-gray d-block mt-3">Completed Documents</small>
									</div>
								</div>
								</div>
							</div> --}}
							
							<div class="grid">
								<div class="grid-header">
									<p class="card-title ml-n1">Summary Overview</p>
								</div>
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" width="100%">
										<thead>
											<tr class="solid-header">
												<th>Documents &nbsp;  <span class="status-indicator rounded-indicator small bg-info"></span></th>
												<th>In Progress &nbsp;  <span class="status-indicator rounded-indicator small bg-warning"></span></th>
												<th>Cancelled &nbsp;  <span class="status-indicator rounded-indicator small bg-danger"></span></th>
												<th>Completed &nbsp;  <span class="status-indicator rounded-indicator small bg-success"></span></th>
											</tr>
										</thead>
										<tbody>
											{{-- <tr>
												<td class="pr-0 pl-4">
													<i class="mdi mdi-file-document mdi-2x"></i>
												</td>
												<td class="pl-md-1">
													<span>
														<span class="status-indicator rounded-indicator small bg-primary"></span><small class="text-black font-weight-medium d-block">Pending</small>
													</span>
												</td>
												<td>
												<small><span class="animated-count">{{ $pendings }}</span></small>
												</td>
											</tr> --}}
											<tr>
												<td>Purchase Request</td>
												
												<td>{{ $inProgress_PR }}</td>
												<td>{{ $cancelled_PR }}</td>
												<td>{{ $completed_PR }}</td>
											</tr>
											<tr>
												<td>Purchase Order</td>
												
												<td>{{ $inProgress_PO }}</td>
												<td>{{ $cancelled_PO }}</td>
												<td>{{ $completed_PO }}</td>
											</tr>
											<tr>
												<td>Voucher</td>
												
												<td>{{ $inProgress_Voucher }}</td>
												<td>{{ $cancelled_Voucher }}</td>
												<td>{{ $completed_Voucher }}</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td><strong>Total Records</strong></th>
												<td><strong>{{ $inProgress_PR+$inProgress_PO+$inProgress_Voucher }}</strong></td>
												<td><strong>{{ $cancelled_PR+$cancelled_PO+$cancelled_Voucher }}</strong></td>
												<td><strong>{{ $completed_PR+$completed_PO+$completed_Voucher }}</strong></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="grid">
								<div class="grid-header">
									<p class="card-title ml-n1">In Progress Summary</p>
								</div>
								<div class="table-responsive">
									<table class="table table-hover table-sm table-bordered" width="100%">
										<thead>
											<tr class="solid-header">
												<th>Offices  <span class="status-indicator rounded-indicator small bg-info"></span></th>
												<th>PR</th>
												<th>PO</th>
												<th>Voucher</th>
												<th>Total</th>
												{{-- <th>Documents Endorsed <span class="status-indicator rounded-indicator small bg-success"></span></th> --}}
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>MBO</td>
												{{-- get modal - TEST --}}
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mbo-pr">{{ $mbo_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mbo-po">{{ $mbo_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mbo-voucher">{{ $mbo_voucher }}</a></td>
												<td>{{ $mbo_pr+$mbo_po+$mbo_voucher}}</td>
											</tr>
											<tr>
												<td>MMO</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mmo-pr">{{ $mmo_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mmo-po">{{ $mmo_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mmo-voucher">{{ $mmo_voucher }}</a></td>
												<td>{{ $mmo_pr+$mmo_po+$mmo_voucher }}</td>
											</tr>
											<tr>
												<td>BAC</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-bac-pr">{{ $bac_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-bac-po">{{ $bac_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-bac-voucher">{{ $bac_voucher }}</a></td>
												<td>{{ $bac_pr+$bac_po+$bac_voucher }}</td>
											</tr>
											<tr>
												<td>Procurement</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-proc-pr">{{ $proc_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-proc-po">{{ $proc_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-proc-voucher">{{ $proc_voucher }}</a></td>
												<td>{{ $proc_pr+$proc_po+$proc_voucher }}</td>
											</tr>
											<tr>
												<td>GSO</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-gso-pr">{{ $gso_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-gso-po">{{ $gso_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-gso-voucher">{{ $gso_voucher }}</a></td>
												<td>{{ $gso_pr+$gso_po+$gso_voucher }}</td>
											</tr>
											<tr>
												<td>MACCO</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-macco-pr">{{ $macco_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-macco-po">{{ $macco_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-macco-voucher">{{ $macco_voucher }}</a></td>
												<td>{{ $macco_pr+$macco_po+$macco_voucher }}</td>
											</tr>
											<tr>
												<td>MTO</td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mto-pr">{{ $mto_pr }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mto-po">{{ $mto_po }}</a></td>
												<td><a href="#" style="color: black;"  data-toggle="modal" data-target="#get-modal-data-mto-voucher">{{ $mto_voucher }}</a></td>
												<td>{{ $mto_pr+$mto_po+$mto_voucher }}</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td><strong>Total</strong></td>
												<td><strong>{{ $mbo_pr+$mmo_pr+$bac_pr+$proc_pr+$gso_pr+$macco_pr+$mto_pr }}</strong></td>
												<td><strong>{{ $mbo_po+$mmo_po+$bac_po+$proc_po+$gso_po+$macco_po+$mto_po }}</strong></td>
												<td><strong>{{ $mbo_voucher+$mmo_voucher+$bac_voucher+$proc_voucher+$gso_voucher+$macco_voucher+$mto_voucher }}</strong></td>
												<td><strong>{{ $mbo_pr+$mmo_pr+$bac_pr+$proc_pr+$gso_pr+$macco_pr+$mto_pr+$mbo_po+$mmo_po+$bac_po+$proc_po+$gso_po+$macco_po+$mto_po+$mbo_voucher+$mmo_voucher+$bac_voucher+$proc_voucher+$gso_voucher+$macco_voucher+$mto_voucher }}</strong></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					<div class="col-md-6">
						<div class="grid">
							{{-- <div class="grid-header">
								
							</div> --}}
							<div class="grid-body">
								<div class="d-flex justify-content-between">
									<p class="card-title">Activity Log</p>
								</div>
								<div class="vertical-timeline-wrapper">
									<div class="timeline-vertical dashboard-timeline">
										@foreach($events as $event)
											<div class="activity-log">
												<p class="log-name">{{ $event->offices->name }}</p>
												<div class="log-details"><i>{{ $event->report }}</i></div>
												</span><small class="log-time" style="color:black">{{ $diff = Carbon\Carbon::parse($event->updated_at)->diffForHumans() }}</small>
											</div>
										@endforeach
									</div>
								</div>
								<br>
								<p class="border-top px-3 py-2 d-block text-gray"><small class="font-weight-medium"><i class="mdi mdi-chevron-right mr-2"></i>Scroll down to view more logs.</small></a>
							</div>
						</div>
					</div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="grid">
                                <div class="grid-header">Filter Records</div>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="filter_office" id="filter_office" required>
                                                    <option>Office</option>
                                                    @foreach ($offices as $office)
                                                        <option value="{{$office->id}}"> {{ $office->name}}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="form-control" name="filter_process_type" id="filter_process_type" required>
                                                    <option>Classification</option>
                                                        {{-- @foreach ($process_types as $process_type) --}}
															{{-- <option value="{{$process_type->id}}"> {{ $process_type->name}} </option> --}}
															<option value="1">Purchase Request</option>
															<option value="9">Purchase Order</option>
															<option value="8">Voucher</option>
                                                        {{-- @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="form-control" name="filter_status" id="filter_status" required>
                                                    <option>Status</option>
                                                        @foreach ($statuses as $status)
                                                            <option value="{{$status->id}}"> {{ $status->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <i title="Filter"><button type="button" name="filter" id="filter" class="btn btn-primary"><span class="mdi mdi-filter mdi-1x"></span></button></i> <i title="Remove Filter"><button type="button" name="reset" id="reset" class="btn btn-primary"><span class="mdi mdi-filter-remove mdi-1x"></span></button></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-12">
					<div class="grid">
						<div class="grid-header">Registered Transactions</div>
						<div class="grid-body">
							<div class="item-wrapper">
								<div class="table-responsive">
									<table id="transactions-data-table" class="table table-bordered table-condensed" width="100%">
										<thead>
											<tr>
												<th>Date</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Type</th>
												<th>End User</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
											<tr>
												<th>Date</th>
												<th>Ref. #</th>
												<th>Sub Ref. #</th>
												<th>Type</th>
												<th>End User</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			@else
				<div class="col-md-12">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="{{ asset('images/slide_0.jpg') }}" alt="Zero slide">
							</div>
						  <div class="carousel-item">
						  	<img class="d-block w-100" src="{{ asset('images/slide_1.jpg') }}" alt="First slide">
						  </div>
						  <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/slide_2.jpg') }}" alt="Second slide">
						  </div>
						  {{-- <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/carousel.jpg') }}" alt="First slide" width="300px;" height="600px;">
						  </div> --}}
						  <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/slide_3.jpg') }}" alt="Third slide" >
						  </div>
						  <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/slide_4.jpg') }}" alt="Fourth slide">
						  </div>
						  <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/slide_5.jpg') }}" alt="Fifth slide">
						  </div>
						  <div class="carousel-item">
							<img class="d-block w-100" src="{{ asset('images/slide_6.jpg') }}" alt="Sixth slide">
						  </div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						  <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						  <span class="carousel-control-next-icon" aria-hidden="true"></span>
						  <span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="col-sm-12">
					<hr><br><br>
					<h2 align="center">Features</h2>
					<br><br>
					<div class="row">
						<div class="col-md-4">
							<div class="grid">
								<div class="grid-body">
									<div class="img1" align="center">
										<img src="{{ asset('images/userfriendly.png') }}" alt="" width="100" height="100" style="margin-bottom:2em;">
										<h5>Transparency</h5>
									</div>
									<br>
									<p>Our goal is to bring Information online in an easy-to-use, readily understandable system.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="grid">
								<div class="grid-body">
									<div class="img1" align="center">
										<img src="{{ asset('images/tracking.png') }}" alt="" width="100" height="100" style="margin-bottom:2em;">
										<h5>Realtime Tracking</h5>
										<br>
									</div>
									<p>E.D.T.S uses barcode to help you find your documents and will keep you updated while it is being processed by multiple offices which may take small amount of time to process.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="grid">
								<div class="grid-body">
									<div class="img1" align="center">
										<img src="{{ asset('images/easy.png') }}" alt="" width="100" height="100" style="margin-bottom:2em;">
										<h5>Easy to use</h5>
									</div>
									<br>
									<p>E.D.T.S aims to provide a friendly user interface to easily track documents being processsed. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
    </div>
</div>
@endsection
@section('script')
    {{-- <script>
        $(function() {
			$('#transactions-data-table').DataTable();
			$('div.dataTables_filter input').focus()
        });
	</script> --}}
	<script>
		$(function() {
		    $('#transactions-data-table').DataTable({
		        processing: true,
		        serverSide: true,
				deferRender: true,
		        ajax: '/home',
		        columns: [
					{ data: 'date_of_entry', name: 'date_of_entry'},
					{ data: 'reference_id', name: 'reference_id'},
					{ data: 'sub_reference_id', name: 'sub_reference_id'},
					{ data: 'process_types.name', name: 'process_types.name'},
                    { data: 'client', name: 'client' },
					{ data: 'description', name: 'description'},
                    { data: 'status', name: 'status' },
		            { data: 'action', name: 'action'},
		        ],
				columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 4,
                },
				{
					render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 5,
				}
             ]
		    });
			// $('div.dataTables_filter input').focus()
		});
    </script>

    <script>
        $(document).ready(function(){
            fill_datatable();
            function fill_datatable(filter_office ='', filter_classification = '', filter_status = '')
            {
                var dataTable = $('#transactions-data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    ajax:{
                        url: "/customsearch",
                        data:{filter_office:filter_office, filter_classification:filter_classification, filter_status:filter_status}
                    },
                    columns: [
						{ data: 'date_of_entry', name: 'date_of_entry'},
						{ data: 'reference_id', name: 'reference_id'},
						{ data: 'sub_reference_id', name: 'sub_reference_id'},
                        { data: 'process_types.name', name: 'process_types.name'},
                        { data: 'client', name: 'client' },
                        { data: 'description', name: 'description'},
                        { data: 'status', name: 'status' },
                        { data: 'action', name: 'action'},
				],
				columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 4,
                },
				{
					render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-201'>" + data + "</div>";
                    },
                    targets: 5,
				}
				],
                order: [[ 0, "asc" ]]
                });
            }
            $('#filter').click(function(){

                var filter_office = $('#filter_office').val();
                console.log(filter_office);
                var filter_classification = $('#filter_process_type').val();
                console.log(filter_classification);
                var filter_status = $('#filter_status').val();
                console.log(filter_status);
                if(filter_office !='' && filter_classification !='' && filter_status !='')
                {
                    $('#transactions-data-table').DataTable().destroy();
                    fill_datatable(filter_office, filter_classification, filter_status);
                }
                else
                {
                    alert('Select filter option');
                }
            });
            $('#reset').click(function(){
                $('filter_office').val('');
                $('filter_process_type').val('');
                $('filter_status').val('');
                $('#transactions-data-table').DataTable().destroy();
                fill_datatable();
            });
        });
	</script>
	
	<script>
		$(document).ready( function () {
			$('#modal-table-mbo-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mbo-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mbo-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mmo-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mmo-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mmo-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-bac-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-bac-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-bac-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-proc-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-proc-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-proc-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-gso-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-gso-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-gso-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-macco-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-macco-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-macco-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mto-pr').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mto-po').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );

		$(document).ready( function () {
			$('#modal-table-mto-voucher').DataTable({
				order: [[ 0, "desc" ]]
			});
		} );
	</script>

@endsection
