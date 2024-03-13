<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">

	<div class="row">
		<div class="col-md-7 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">
						Focus Technologies
						<a href="javascript:void(0)" class="float-right text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<p><span class="text-primary">Register Number : </span>FT0070</p>
							<p><span class="text-primary">Incorporation Date : </span>07 May 2000</p>
							<p><span class="text-primary">VAT Number : </span>VT0070</p>
						</div>
						<div class="col-md-6">
							<p>
								<span class="text-primary">Address:</span><br>

								Santiago de Surco
								<br> Av.Caminos del Inca 1325<br>
								United States
							</p>

						</div>
					</div>
					<div class="text-center mt-3">
						<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-information">Add Company Information</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0">
						Contact
					</h4>
				</div>
				<div class="card-body">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Contact" value="07448503267">
						<div class="input-group-append">
							<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="focustechnology.com">
						<div class="input-group-append">
							<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
					</div>
					<div class="input-group mb-0">
						<input type="email" class="form-control" placeholder="hr@focustechnology.com">
						<div class="input-group-append">
							<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="company-doc">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title d-inline-block mb-0">
							Departments
						</h4>
						<a href="javascript:void(0)" class="float-right add-doc text-primary" data-toggle="modal" data-target="#addDocument">Add Departments
						</a>
					</div>
					<div class="card-body">
						<div class="employee-office-table">
							<div class="table-responsive">
								<table class="table custom-table">
									<thead>
										<tr>
											<th style="display: none;">ID</th>
											<th>Department Name</th>
											<th>Mangaer Name</th>
											<th>Company</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($departments as $dept) { ?>
											<tr>
												<td style="display:none"><?= $dept['department_id'] ?></td>
												<td class="text-primary"><?= $dept['department_name'] ?></td>
												<td><a href="javascript:void(0)" class="text-primary">
														<div class="avatar">
															<img alt="avatar image" src="<?= $dept['profile'] ?>" class="img-fluid">
														</div>
														<?= $dept['first_name'] . " " . $dept['last_name'] ?>
													</a></td>
												<td><?= $dept['company_id'] ?></td>
												<td>
													<div class="table-action d-flex justify-content-between">
														<form action="#">
															<input type="hidden" name="dept_id" value="<?= $dept['department_id'] ?>">
															<button type="submit" class="btn btn-sm btn-outline-warning"> <span class="lnr lnr-pencil"></span>Edit</button>
														</form>
														<a href="#" class="btn btn-sm btn-outline-success detail<?= $dept['department_id'] ?>" data-toggle="modal" data-target="#view<?= $dept['department_id'] ?>">
															<span class="lnr lnr-eye"></span> View
														</a>
														<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
															<span class="lnr lnr-trash"></span> Delete
														</a>
													</div>
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
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm grow flex-fill">
				<div class="card-header">
					<div class="d-inline-block">
						<h4 class="card-title mb-0">Focus Technologies</h4>
						<p class="mb-0 ctm-text-sm">Head Office</p>
					</div>
					<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
						<a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i> </a>
					</div>
				</div>
				<div class="card-body">
					<h4 class="card-title">Members</h4>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Danny Ward"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></span></a>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Craver"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-4.jpg"></span></a>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Jenni Sims"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-3.jpg"></span></a>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img alt="avatar image" src="assets/img/profiles/img-6.jpg" class="img-fluid"></span></a>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="John Gibbs"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-2.jpg"></span></a>
					<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></span></a>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card shadow-sm grow ctm-border-radius flex-fill">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Overview </h4>
					<a href="employees-team.html" class="float-right text-primary">Manage Teams</a>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6 col-6 text-center">
							<h5 class="btn btn-outline-primary mt-3"><b><?= count($departments) ?></b></h5>
							<p class="mb-3">Teams</p>
						</div>
						<div class="col-md-6 col-6 text-center">
							<h5 class="btn btn-outline-primary mt-3"><b><?= count($users) ?></b></h5>
							<p class="mb-3">People</p>
						</div>
					</div>
					<div class="text-center">
						<a href="/employeelist" class="btn btn-theme text-white ctm-border-radius mt-2 button-1">People Directory</a>
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

<!--  add office The Modal -->
<div class="modal fade" id="addOffice">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Create a New Office</h4>
				<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people's time off allowances.</p>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Name">
				</div>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editOffice">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Edit Office</h4>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Office Name">
				</div>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">Save</button>
			</div>
		</div>
	</div>
</div>

<!--Delete The Modal -->
<div class="modal fade" id="delete">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
				<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>

<!-- New Team The Modal -->
<div class="modal fade" id="add-information" role="document">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body style-add-modal">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Add Company Information</h4>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Company Name">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Registered Company Number">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control datetimepicker" type="text" placeholder="Incorporation Date">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Vat Number">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Address Line1">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Address Line2">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="City">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Country">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Post-Code">
					</div>
				</div>
				<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
			</div>
		</div>
	</div>
</div>

<!-- New Folder The Modal -->
<div class="modal fade" id="NewFolder">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Create New Folder</h4>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Name">
				</div>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
			</div>
		</div>
	</div>
</div>

<!-- add document The Modal -->
<div class="modal fade" id="addDocument">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Create New Departments</h4>
				<form action="controllers/companies/add.department.controller.php" method="post">
					<div class="form-group">
						<label for="departementNmae">Department Name</label>
						<input type="text" class="form-control" name="departmentName">
					</div>
					<div class="form-group">
						<label for="departmentDESC">Department Description</label>
						<input type="text" class="form-control" name="departmentDESC">
					</div>
					<div class="form-group">
						<label for="manager">Manger</label>
						<select class="select" name="manager" id="manager">
							<option value="1">Please select a manager</option>
							<?php foreach ($users as $manager) { ?>
								<option value="<?= $manager['uid'] ?>"><?= $manager['first_name'] . " " . $manager['last_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- add office The Modal -->
<div class="modal fade" id="addOffice1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Add Office</h4>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Name">
				</div>
				<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
			</div>
		</div>
	</div>
</div>
<?php foreach ($departments as $dept) {
	$emp = getEmployeeUnder($dept['department_id']); ?>
	<div class="modal fade " id="view<?= $dept['department_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $dept['department_name'] ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="d-flex text-black ">
						<div class="flex-shrink-0">
							<img src="<?= $dept['profile'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
						</div>
						<div class="flex-grow-1 ms-3 ml-4">
							<h5 class="mb-1"><?= $dept['first_name'] . " " . $dept['last_name'] ?></h5>
							<p class="mb-2 pb-1" style="color: #2b2a2a;"><?= $dept['department_name'] ?></p>
							<div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
								<div>
									<p class="small text-muted mb-1">Projects</p>
									<p class="mb-0">41</p>
								</div>
								<div class="px-3">
									<p class="small text-muted mb-1">Employees</p>
									<p class="mb-0">976</p>
								</div>
								<div>
									<p class="small text-muted mb-1">Rating</p>
									<p class="mb-0">8.5</p>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex text-black ">
						<div class="flex-grow-1 ms-3 mt-2">
							<div class="rounded-3 p-2 mb-2" style="background-color: #efefef;">
								<h5 class="text-center">Employee detail</h5>
								<table class='table' style="width: 100%;">
									<thead class="thead-dark">
										<th style="display:none">ID</th>
										<th>Employee Name</th>
										<th>Total Request</th>
										<th>Remain Leave</th>
										<th>Carry over</th>
										<th>Total Remain</th>
									</thead>
									<tbody>
										<?php if (count($emp) > 0) {
											foreach ($emp as $per) { ?>
												<tr>
													<td style="display:none"><?= $per['uid'] ?> </td>
													<td><?= $per['first_name'] . " " . $per['last_name'] ?></td>
													<td>9</td>
													<td>2</td>
													<td>8</td>
													<td>10</td>
												</tr>
											<?php }
										} else { ?>
											<tr>
												<p>There is no employee in this departments</p>
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
<?php } ?>
<?php require "layouts/footer.php" ?>
<?php foreach ($departments as $dept) { ?>
	<script>
		$(document).ready(function() {
			$(".detail<?= $dept['department_id'] ?>").on("click", function() {
				$("#view<?= $dept['department_id'] ?>").modal("show");
				console.log(data);
			});
		});
	</script>
<?php } ?>