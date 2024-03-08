<?php
include "layouts/header.php";
include "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<?php
	if (!isset($_SESSION['user']['admin_username'])) { ?>
		<div class="modal fade" id="add_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Requests Leave Type </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="controllers/leaves/create.leave.controller.php" method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>
											Leave Type
											<span class="text-danger">*</span>
										</label>
										<select class="form-control select" name="leaveType">
											<?php foreach ($leaveTypes as $type) { ?>
												<option value='<?= $type['leaveType_id'] ?>'><?= $type['leaveType_desc'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>Total days
											<span class="text-danger">*</span>
										</label>
										<input type="text" class="form-control" placeholder="<?= $_SESSION['user']['total_allowed_leave']; ?>" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Start From
											<span class="text-danger">*</span>
										</label>
										<input name="dateValue" type="text" class="form-control datetimepicker">
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>To end
											<span class="text-danger">*</span>
										</label>
										<input type="text" name="dataValueEnd" class="form-control datetimepicker">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>
											Status of user
											<span class="text-danger">*</span>
										</label>
										<span class="form-control" name="statuID">3</span>
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>Number of Days Leave</label>
										<input type="text" class="form-control" placeholder="0" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group mb-0">
										<label>Reason</label>
										<textarea class="form-control" rows=4></textarea>
									</div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Add Request</button>
								<a href="#" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="col-md-12">
		<div class="card ctm-border-radius shadow-sm grow">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-0">Leave Details</h4>
				<button class="btn btn-outline-primary addleave">Request for new leave</button>
			</div>
			<div class="card-body">
				<div class="employee-office-table">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<thead>
								<tr>
									<th>Date</th>
									<th>Total Employees</th>
									<th>First Half</th>
									<th>Second Half</th>
									<th>Working From Home</th>
									<th>Absent</th>
									<th>Today Aways</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>05 May 2019</td>
									<td>7</td>
									<td>6</td>
									<td>6</td>
									<td>1</td>
									<td>0</td>
									<td>1</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card ctm-border-radius shadow-sm grow">
			<div class="card-header d-flex justify-content-between">
				<h4 class="card-title mb-0">Today Leaves</h4>
				<button type="button" class="btn btn-outline-danger removebtn"> Remove all requests </button>
			</div>
			<div class="card-body">
				<div class="employee-office-table">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<thead>
								<tr>
									<th style=" display: none">Request ID</th>
									<th>Employee</th>
									<th>Leave Type</th>
									<th>From</th>
									<th>To</th>
									<th colspan="2">Status</th>
									<th class="text-right">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($leave_requests as $request) { ?>
									<tr>
										<td style=" display: none"><?= $request['request_id'] ?></td>
										<td>
											<h2>
												<div class="avatar">
													<img alt="avatar image" src="<?= $request['profile'] ?>" class="img-fluid">
												</div>
												<a href="employment.html"><?= $request['first_name'] . " " . $request['last_name'] ?></a>
											</h2>
										</td>
										<td><?= $request['leaveType_desc'] ?></td>
										<td><?= $request['start_date'] ?></td>
										<td><?= $request['end_date'] ?></td>
										<td>
											<form action="controllers/leaves/edit_leave_request.controller.php" class="d-flex justify-content-between" method="post">
												<input type="hidden" value="<?= $request['request_id'] ?>" name="request_id">
												<select name="leave_status" class="form-control">
													<?php foreach ($leaves as $leave) {
														if ($leave['status_desc'] == $request['status_desc']) { ?>
															<option value="<?= $leave["status_id"] ?>" selected><?= $leave['status_desc'] ?></option>
														<?php  } else { ?>
															<option value="<?= $leave["status_id"] ?>"><?= $leave['status_desc'] ?></option>
													<?php }
													} ?>
												</select>
												<button class="btn btn-theme button-1 text-white">Save</button>
											</form>
										</td>
										<td></td>
										<td class="text-right text-danger">
											<a href="#" class="btn btn-sm btn-outline-danger deletebtn">
												<span class="lnr lnr-trash"></span> Delete</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!--Delete The Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete you leave requests</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="/removeall" method="POST">
				<div class="modal-body">
					<input type="hidden" name="delete_id" id="delete_id">
					<h6> Are you sure you want to remove all the requests? </h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> I'm not sure </button>
					<button type="submit" name="deletedata" class="btn btn-outline-danger"> Yes I'm sure </button>
				</div>
			</form>

		</div>
	</div>
</div>
<div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Remove leave requests</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controllers/leaves/delete_leave.request.controllers.php" method="POST">
				<div class="modal-body">
					<input type="hidden" name="request_id" id="request_id">
					<h6> Are you sure you want to delete this request? </h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
					<button type="submit" name="deletedata" class="btn btn-outline-danger"> Remove </button>
				</div>
			</form>

		</div>
	</div>
</div>
<?php require "layouts/footer.php"; ?>