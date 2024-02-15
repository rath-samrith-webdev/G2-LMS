<?php
include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="card shadow-sm ctm-border-radius grow">
		<div class="card-body align-center">
			<div class="row filter-row">
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
						<select class="form-control select">
							<option selected>Start Date</option>
							<option>Date Of Birth</option>
							<option>Created At</option>
							<option>Leaving Date</option>
							<option>Visa Expiry Date</option>
						</select>

					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
						<input type="text" class="form-control datetimepicker" placeholder="From">
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
						<input type="text" class="form-control datetimepicker" placeholder="To">
					</div>
				</div>

				<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
					<a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </a>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow-sm grow ctm-border-radius">
		<div class="card-body align-center">
			<ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
				<li class="nav-item mr-2">
					<a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Official Reports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Personal reports</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="card shadow-sm grow ctm-border-radius">
		<div class="card-body align-center">
			<div class="tab-content" id="pills-tabContent">

				<!--Tab 1-->
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Employee</th>
										<th>Leave Type</th>
										<th>From</th>
										<th>To</th>
										<th>Days</th>
										<th>Remaining Days</th>
										<th>Notes</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
											<h2><a href="employment.html">Danny Ward</a></h2>
										</td>
										<td>Parental Leave</td>
										<td>05 Dec 2019</td>
										<td>07 Dec 2019</td>
										<td>3</td>
										<td>9</td>
										<td>Parenting Leave</td>
										<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
										<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
												<span class="lnr lnr-trash"></span> Delete
											</a></td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img src="assets/img/profiles/img-4.jpg" alt="Linda Craver" class="img-fluid"></a>
											<h2><a href="employment.html">Linda Craver</a></h2>
										</td>
										<td>Sick Leave</td>
										<td>05 Dec 2019</td>
										<td>05 Dec 2019</td>
										<td>1</td>
										<td>11</td>
										<td>Going to Hospital</td>
										<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
										<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
												<span class="lnr lnr-trash"></span> Delete
											</a></td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img src="assets/img/profiles/img-3.jpg" alt="Jenni Sims" class="img-fluid"></a>
											<h2><a href="employment.html">Jenni Sims</a></h2>
										</td>
										<td>Working From Home</td>
										<td>05 Dec 2019</td>
										<td>05 Dec 2019</td>
										<td>1</td>
										<td>11</td>
										<td>Raining</td>
										<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
										<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
												<span class="lnr lnr-trash"></span> Delete
											</a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!--/Tab 1-->

				<!-- Tab 2-->
				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table">
								<thead>
									<tr>
										<th>Name</th>
										<th>Gender</th>
										<th>Salary Current</th>
										<th>Date Of Birth</th>
										<th>Phone Number</th>
										<th>Address</th>
										<th>Bank Name</th>
										<th>Account Number</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
											<h2><a href="employment.html">Danny Ward</a></h2>
										</td>
										<td>
											Male
										</td>
										<td>$3000</td>
										<td>25 Jun 1984</td>
										<td>9876543231</td>
										<td>201 Lunetta Street,Plant City,<br> Florida(FL), 33566</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987652</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-4.jpg"></a>
											<h2><a href="employment.html"> Linda Craver</a></h2>
										</td>
										<td>
											Female
										</td>
										<td>$2000</td>
										<td>14 Feb 1984</td>
										<td>9876543221</td>
										<td>683 Longview Avenue,New York, <br> New York(NY), 10011</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987662</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-3.jpg"></a>
											<h2><a href="employment.html">Jenni Sims</a></h2>
										</td>
										<td>
											Female
										</td>
										<td>$4000</td>
										<td>20 Jan 1984</td>
										<td>9876534214</td>
										<td> 4923 Front Street,Detroit,<br> Michigan(MI), 48226</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987653</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-6.jpg" class="img-fluid"></a>
											<h2><a href="employment.html"> Maria Cotton</a></h2>
										</td>
										<td>
											Female
										</td>
										<td>$5000</td>
										<td>15 Jul 1984</td>
										<td>9876541123</td>
										<td>1246 Parkway Street, Brawley, <br>California(CA), 92227</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987654</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-2.jpg"></a>
											<h2><a href="employment.html"> John Gibbs</a></h2>
										</td>
										<td>
											Male
										</td>
										<td>$4500</td>
										<td>05 Dec 1984</td>
										<td>9876541132</td>
										<td>4604 Fairfax Drive,Rochelle Park,<br> New Jersey(NJ), 07662</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987655</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
											<h2><a href="employment.html"> Richard Wilson</a></h2>
										</td>
										<td>
											Male
										</td>
										<td>$4600</td>
										<td>25 Apr 1984</td>
										<td>9876541321</td>
										<td>3088 Gordon Street, Los Angeles,<br> California(CA), 90017</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987656</td>
									</tr>
									<tr>
										<td>
											<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-8.jpg"></a>
											<h2><a href="employment.html">Stacey Linville</a></h2>
										</td>
										<td>
											Female
										</td>
										<td>$4700</td>
										<td>23 Jan 1984</td>
										<td>9876542312</td>
										<td>835 Sarah Drive,Lafayette,<br> Louisiana(LA), 70506</td>
										<td>Life Essence Banks, Inc.</td>
										<td>112300987657</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /Tab 2-->

			</div>
			<div class="text-center mt-3">
				<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report</a>
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


<!-- Create Reports The Modal -->
<div class="modal fade" id="add_report">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title mb-3">Create Report</h4>
				<form>
					<p class="mb-2">Select Report Type</p>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
						<label class="custom-control-label" for="customRadio">Team Member</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
						<label class="custom-control-label" for="customRadio2">Time Off</label>
					</div>

					<div class="form-group">
						<label class="mt-3">What data would you like to include?</label>
						<!-- Multiselect dropdown -->
						<select multiple class="select w-100 form-control">
							<option>Full Name</option>
							<option>Working Days Off</option>
							<option>Booked By</option>
							<option>Start Date</option>
							<option>End Date</option>
							<option>Team Name</option>
							<option>First Name</option>
							<option>Last Name</option>
							<option>Email</option>
							<option>Date Of Birth</option>
							<option>Phone Number</option>
						</select><!-- End -->
					</div>
				</form>
				<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
			</div>
		</div>
	</div>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>