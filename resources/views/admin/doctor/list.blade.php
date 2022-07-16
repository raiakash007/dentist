	@extends("layouts.app")

	@section("style")
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Doctor List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered user_table" style="width:100%">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Usertype</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>City</th>
										<th>State</th>
										<th>Created At</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		@endsection
	
	@section("script")
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		// $(document).ready(function() {
		// 	$('#example').DataTable();
		//   } );
	</script>
	<script>
		$(document).ready(function() {	
		var base_url = '{{ URL::to("/admin") }}';
		var permission_table = $('.user_table').DataTable({
		    serverSide: false,
		    lengthChange: false,
		    ajax: base_url + '/doctor_list',

		        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			        var userType = aData['userType'];
			      	if (userType == '1') {
			            $('td:eq(1)', nRow).html('<span class="badge bg-gradient-quepal text-white shadow-sm w-100">Doctor</span>');
			        }
			        return nRow;
			    },



		   	"columns": [
		        {"data": "sr_no"},
		        {"data": "userType"},
		        {"data": "name"},
		        {"data": "email"},
		        {"data": "phone"},
		        {"data": "city"},
		        {"data": "state"},
		        {"data": "created_at"},
		        {"data": "action"}
		    ],
		    dom: 'Bfrtip',
		    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
		});


		} );
	</script>
	@endsection