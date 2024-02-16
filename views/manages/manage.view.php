<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
		<div class="card-body">
			<ul class="list-group list-group-horizontal-lg d-flex justify-content-between">
				<li class="list-group-item text-center active button-5"><a href="manage.html" class="text-white">Account Roles</a></li>
				<li class="list-group-item text-center active button-5"><a href="/createEmployee" class="text-white">Create Users</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Today Leaves</h4>
				</div>
				<div class="card-body">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Profile</th>
										<th>First name</th>
										<th>Last name</th>
										<th>Email</th>
										<th>Country</th>
										<th>Start Date</th>
										<th>Job Title</th>
										<th>Employment Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 0; $i < count($users); $i++) { ?>
										<tr>
											<td>
												<a href="/profileImage?id=<?= $users[$i]['uid'] ?>" class="avatar"><img alt="avatar image" src="<?= $users[$i]['profile'] ?>" class="img-fluid"></a>
											</td>
											<td>
												<h2><a href="/profiles?uid=<?= $users[$i]['uid'] ?>"><?= $users[$i]['first_name'] ?></a></h2>
											</td>
											<td><?= $users[$i]['last_name'] ?></td>
											<td><?= $users[$i]['email'] ?></td>
											<td>USA</td>
											<td>07 Dec 2019</td>
											<td>Project Manager</td>
											<td>Permenent</td>
											<td class="text-right text-danger">
												<a href="/" class="btn btn-sm btn-outline-danger" data-target="#delete">
													<span class="lnr lnr-trash"></span> Delete
												</a>
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
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>

<!-- Add Working Weeks -->
<div class="modal fade" id="addWorkWeek">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<form>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Edit Working Week</h4>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Mon" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Mon">Mon</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Tue" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Tue">Tue</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Wed" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Wed">Wed</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Thu" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Thu">Thu
						</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Fri" class="custom-control-input" checked>
						<label class="mb-0 custom-control-label" for="Fri">Fri</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sat" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sat">Sat</label>
					</div>
					<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
						<input type="checkbox" id="Sun" class="custom-control-input">
						<label class="mb-0 custom-control-label" for="Sun">Sun</label>
					</div>
					<br>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Add Working Weeks -->
<div class="modal fade" id="edit_timedefault">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Company Default</h4>
				<div class="form-group">
					<label>Time Off Allowance</label>
					<input type="text" class="form-control" placeholder="Name" value="25 Days">
				</div>
				<div class="form-group">
					<label>Year Start</label>
					<input type="text" class="form-control datetpicker" placeholder="Year Start" value="01-01-2019">
				</div>
				<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
			</div>
		</div>
	</div>
</div>
<?php require "layouts/footer.php"; ?>