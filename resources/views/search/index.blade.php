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
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12">
					<div class="grid">
						<div class="grid-header">Track Records</div>
						<div class="grid-body">
							<div class="item-wrapper">
								<div class="table-responsive">
									<table id="transactions-data-table" class="table table-bordered table-condensed" width="100%">
										<thead>
											<tr>
												<th>Date of Entry</th>
												<th>Ref. #</th>
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
												<th>Date of Entry</th>
												<th>Ref. #</th>
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
				</div>
			</div>
		</div>
	</div>	       	   
@endsection
@section('script')
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

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
                    targets: 3
                }
            ]
		    });
			$('div.dataTables_filter input').focus()
		});
	</script>
@endsection