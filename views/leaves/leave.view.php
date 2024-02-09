
<div class="col-xl-9 col-lg-8 col-md-12">
							
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
										<div class="card-header">
											<h4 class="card-title mb-0">Today Leaves</h4>
										</div>
										<div class="card-body">
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
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>