	@extends("layouts.app")

	@section("style")
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
	@endsection

		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Sub Admin List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
						  <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#subAdminModal"> <i class="bx bxs-plus-square"></i>Add New Order</a></div>
						</div>
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered user_table" style="width:100%">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Usertype</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
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

		<div class="modal fade" id="subAdminModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Subadmin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                	<form class="smooth-submit" method="POST" action="add_admin_subadmin" id="add_admin_subadmin">
                		@csrf
	                    <div class="modal-body">
		            		  	<div class="row mb-3">
		                            <div class="col-sm-6 text-secondary">
		                            	<label>Name</label>
		                                <input name="name" type="text" class="form-control" placeholder="Enter Name" />
		                            </div>
		                             <div class="col-sm-6 text-secondary">
		                            	<label>User Type</label>
		                               	<select class="form-control" name="user_type">
		                               		<option value="3">Admin</option>
		                               		<option value="2">Sub Admin</option>
		                               	</select>
		                            </div>
		                        </div>
	                         	
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Email</label>
		                                <input name="email" type="email" class="form-control" placeholder="Enter Email" />
		                            </div>
		                        </div>
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Phone</label>
		                                <input type="text" class="form-control" placeholder="Enter Phone" name="phone" />
		                            </div>
		                        </div>
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Password</label>
		                                <input  class="form-control" type="password" placeholder="Enter Password" name="password" />
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


		<div class="modal fade" id="subAdminEditModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Subadmin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                	<form class="smooth-submit" method="POST" action="edit_admin_subadmin" id="edit_admin_subadmin">
                		@csrf
	                    <div class="modal-body">
		            		  	<div class="row mb-3">
		            		  		<input type="hidden" id="user_id" name="id">
		                            <div class="col-sm-6 text-secondary">
		                            	<label>Name</label>
		                                <input name="name" type="text" class="form-control" placeholder="Enter Name" id="user_name" />
		                            </div>
		                             <div class="col-sm-6 text-secondary">
		                            	<label>User Type</label>
		                               	<select class="form-control" name="user_type" id="user_type">
		                               		<!-- <option value="3">Admin</option>
		                               		<option value="2">Sub Admin</option> -->
		                               	</select>
		                            </div>
		                        </div>
	                         	
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Email</label>
		                                <input name="email" type="email" class="form-control" placeholder="Enter Email" id="user_email" />
		                            </div>
		                        </div>
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Phone</label>
		                                <input type="text" class="form-control" placeholder="Enter Phone" name="phone" id="user_phone" />
		                            </div>
		                        </div>
		                        <div class="row mb-3">
		                            <div class="col-sm-12 text-secondary">
		                            	<label>Password</label>
		                                <input  class="form-control" type="password" placeholder="Enter Password" name="password" id="user_password" />
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
		var user_table = $('.user_table').DataTable({
		    serverSide: false,
		    lengthChange: false,
		    ajax: base_url + '/sub_admin_list',

		        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			        var userType = aData['userType'];
			      	if (userType == '2') {
			            $('td:eq(1)', nRow).html('<span class="badge bg-gradient-bloody text-white shadow-sm w-100">Sub Admin</span>');
			        }
			        return nRow;
			    },

		   	"columns": [
		        {"data": "sr_no"},
		        {"data": "userType"},
		        {"data": "name"},
		        {"data": "email"},
		        {"data": "phone"},
		        {"data": "created_at"},
		        {"data": "action"}
		    ],
		    dom: 'Bfrtip',
		    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
		});
		$("#add_admin_subadmin").on('aftersubmit', function (e, data) {
		    $('#pleasewait').modal('hide');
		    Lobibox.notify(data.type, {msg: data.message});
		    if (data.type === 'success') {
		        $("#subAdminModal").modal('hide');
		        user_table.ajax.url(base_url + "/sub_admin_list").load();
		        $(this).trigger('reset');
		    }
		});


		$(".user_table").on('click', '.delete_sub_admin', function () {
		    var id = $(this).attr('user_id');
		    var table = 'App\\User';
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
		                        user_table.ajax.url(base_url + "/sub_admin_list").load();
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


		$(".user_table").on('click', '.edit-user', function () {
		    var id = $(this).attr('user_id');
		    var table = 'users';
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
		            var user = data.data[0];
		            $("#user_id").val(user.id);
		            $("#user_name").val(user.name);
		            $("#user_email").val(user.email);
		            $("#user_phone").val(user.phone);
		            $("#user_password").val(user.password);
		            if(user.userType == 3){
		            	var sel = 'selected';
		            }
		            else{
		            	var sels = 'selected';
		            }
		            $('#user_type').append('<option '+ sel +' value="3">Admin</option><option '+ sels +' value="2">Sub Admin</option>');
		        },
		        error: function (data) {
		            console.log('unable to send request..');
		        }
		    });
		});

		

		$("#edit_admin_subadmin").on('aftersubmit', function (e, data) {
		    $('#pleasewait').modal('hide');
		    Lobibox.notify(data.type, {msg: data.message});
		    if (data.type === 'success') {
		        $("#subAdminEditModal").modal('hide');
		        user_table.ajax.url(base_url + "/sub_admin_list").load();
		        $(this).trigger('reset');
		    }
		});
		} );
		
	</script>
	@endsection