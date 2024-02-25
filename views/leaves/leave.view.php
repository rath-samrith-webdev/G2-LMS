<?php
include "layouts/header.php";
include "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<?php
	if (!isset($_SESSION['user']['admin_username'])) { ?>

		<div class="row">
			<div class="col-md-12">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0">Apply Leaves</h4>
					</div>
					<div class="card-body">
						<form>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>
											Leave Type
											<span class="text-danger">*</span>
										</label>
										<select class="form-control select">
											<option>Select Leave</option>
											<option>Working From Home</option>
											<option>Sick Leave</option>
											<option>Parental Leave</option>
											<option>Annual Leave</option>
											<option>Normal Leave</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>Remaining Leaves</label>
										<input type="text" class="form-control" placeholder="10" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>From</label>
										<input type="text" class="form-control datetimepicker">
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>To</label>
										<input type="text" class="form-control datetimepicker">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>
											Half Day
											<span class="text-danger">*</span>
										</label>
										<select class="form-control select">
											<option>Select</option>
											<option>First Half</option>
											<option>Second Half</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 leave-col">
									<div class="form-group">
										<label>Number of Days Leave</label>
										<input type="text" class="form-control" placeholder="2" disabled>
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
								<a href="javascript:void(0);" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Apply</a>
								<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Leave Details</h4>
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
										<th>Request ID</th>
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
											<td><?= $request['request_id'] ?></td>
											<td>
												<h2><a href="employment.html"><?= $request['first_name'] ?></a></h2>
											</td>
											<td>Parental Leave</td>
											<td>05 Dec 2019</td>
											<td>07 Dec 2019</td>
											<td>
												<form action="controllers/leaves/edit_leave_request.controller.php" class="d-flex justify-content-between" method="post">
													<input type="hidden" value="<?= $request['request_id'] ?>" name="request_id">
													<select name="leave_status" class="form-control">
														<?php foreach ($leaves as $leave) { ?>
															<option value="<?= $leave["status_id"] ?>"><?= $leave['status_desc'] ?></option>
														<?php } ?>
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