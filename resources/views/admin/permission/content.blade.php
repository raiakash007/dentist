	@extends("layouts.app")

	@section("style")
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Permission List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
						  <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#permissionModal"> <i class="bx bxs-plus-square"></i>Add New Order</a></div>
						</div>
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered permission_table" style="width:100%">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Name</th>
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

		<div class="modal fade" id="permissionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                	<form class="smooth-submit" method="POST" action="add_permission" id="add_permission">
                		@csrf
	                    <div class="modal-body">
            		  	<div class="row mb-3">
                            <div class="col-sm-12 text-secondary">
                            	<label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>		                        
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                        <button type="submit" class="btn btn-primary">Save changes</button>
	                    </div>
                	</form>
                </div>
            </div>
        </div>


		<div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                	<form class="smooth-submit" method="POST" action="edit_permission" id="edit_permission">
                		@csrf
	                    <div class="modal-body">
		            		  	<div class="row mb-3">
		            		  		<input type="hidden" id="permission_id" name="id">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Name</label>
		                                <input name="name" type="text" class="form-control" placeholder="Enter Name" id="name" />
		                            </div>
		                        </div>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                        <button type="submit" class="btn btn-primary">Save changes</button>
	                    </div>
                	</form>
                </div>
            </div>
        </div>
		<!--end page wrapper -->
		@endsection
	
	@section("script")
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		// $(document).ready(function() {
		// 	$('#example').DataTable();
		//   } );
	</script>
	<script>
		$(document).ready(function() {
		var base_url = '{{ URL::to("/admin") }}';
		var permission_table = $('.permission_table').DataTable({
		    serverSide: false,
		    lengthChange: false,
		    ajax: base_url + '/permission_list',

		        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			        var userType = aData['userType'];
			      	if (userType == '2') {
			            $('td:eq(1)', nRow).html('<span class="badge bg-gradient-bloody text-white shadow-sm w-100">Sub Admin</span>');
			        }
			        return nRow;
			    },

		   	"columns": [
		        {"data": "sr_no"},
		        {"data": "name"},
		        {"data": "created_at"},
		        {"data": "action"}
		    ],
		    dom: 'Bfrtip',
		    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
		});
		$("#add_permission").on('aftersubmit', function (e, data) {
		    $('#pleasewait').modal('hide');
		    Lobibox.notify(data.type, {msg: data.message});
		    if (data.type === 'success') {
		        $("#permissionModal").modal('hide');
		        permission_table.ajax.url(base_url + "/permission_list").load();
		        $(this).trigger('reset');
		    }
		});


		$(".permission_table").on('click', '.delete_data', function () {
		    var id = $(this).attr('permission_id');
		    var table = 'App\\Permission';
		    var key = 'id';
		    var token = $('meta[name=csrf-token]').attr("content");
	
		    swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then(function (result) {
				console.log(result);
		        if (result) {
		            $.ajax({
		                url: base_url + '/delete_record',
		                type: 'post',
		                dataType: 'json',
		                data: {
		                    id: id,
		                    table: table,
		                    key: key,
		                    _token: token
		                },
		                success: function (data) {
		                    if (data.type === "success")
		                    {
		                        Lobibox.notify(data.type, {msg: data.message});
		                        permission_table.ajax.url(base_url + "/permission_list").load();
		                    } else {
		                        Lobibox.notify(data.type, {msg: data.message});
		                    }
		                },
		                error: function (data) {
		                    console.log(data);
		                }
		            });
		        }
		    });
		});


		$(".permission_table").on('click', '.edit-user', function () {
		    var id = $(this).attr('permission_id');
		    var table = 'permissions';
		    var key = 'id';
		    var token = $('meta[name=csrf-token]').attr("content");
		    $.ajax({
		        url: base_url + '/retrieve',
		        type: 'post',
		        dataType: 'json',
		        data: {
		            id: id,
		            table: table,
		            key: key,
		            _token: token
		        },
		        success: function (data) {
		            var data = data.data[0];
		            $("#permission_id").val(data.id);
		            $("#name").val(data.name);
		        },
		        error: function (data) {
		            console.log('unable to send request..');
		        }
		    });
		});


		$("#edit_permission").on('aftersubmit', function (e, data) {
		    $('#pleasewait').modal('hide');
		    Lobibox.notify(data.type, {msg: data.message});
		    if (data.type === 'success') {
		        $("#EditModal").modal('hide');
		        permission_table.ajax.url(base_url + "/permission_list").load();
		        $(this).trigger('reset');
		    }
		});
		
		
		} );
	</script>
	@endsection