<?php require "layouts/header.php"; ?>
<header class="header">

	<div class="top-header-section">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-3 col-md-3 col-sm-3 col-6">
					<div class="logo my-3 my-sm-0">
						<a href="index.html">
							<img src="assets/img/logo.png" alt="logo image" class="img-fluid" width="100">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
					<div class="user-block d-none d-lg-block">
						<div class="row align-items-center">
							<div class="col-lg-12 col-md-12 col-sm-12">

								<div class="user-notification-block align-right d-inline-block">
									<div class="top-nav-search">
										<form>
											<input type="text" class="form-control" placeholder="Search here">
											<button class="btn" type="submit"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</div>


								<div class="user-notification-block align-right d-inline-block">
									<ul class="list-inline m-0">
										<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title data-original-title="Apply Leave">
											<a href="leave.html" class="font-23 menu-style text-white align-middle">
												<span class="lnr lnr-briefcase position-relative"></span>
											</a>
										</li>
									</ul>
								</div>


								<div class="user-info align-right dropdown d-inline-block header-dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
										<div class="user-avatar d-inline-block">
											<img src="assets/img/profiles/img-6.jpg" alt="user avatar" class="rounded-circle img-fluid" width="55">
										</div>
									</a>

									<div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
										<a class="dropdown-item p-2" href="employment.html">
											<span class="media align-items-center">
												<span class="lnr lnr-user mr-3"></span>
												<span class="media-body text-truncate">
													<span class="text-truncate">Profile</span>
												</span>
											</span>
										</a>
										<a class="dropdown-item p-2" href="settings.html">
											<span class="media align-items-center">
												<span class="lnr lnr-cog mr-3"></span>
												<span class="media-body text-truncate">
													<span class="text-truncate">Settings</span>
												</span>
											</span>
										</a>
										<a class="dropdown-item p-2" href="login.html">
											<span class="media align-items-center">
												<span class="lnr lnr-power-switch mr-3"></span>
												<span class="media-body text-truncate">
													<span class="text-truncate">Logout</span>
												</span>
											</span>
										</a>
									</div>

								</div>

							</div>
						</div>
					</div>
					<div class="d-block d-lg-none">
						<a href="javascript:void(0)">
							<span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
						</a>

						<div class="offcanvas-menu" id="offcanvas_menu">
							<span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
							<div class="user-info align-center bg-theme text-center">
								<a href="javascript:void(0)" class="d-block menu-style text-white">
									<div class="user-avatar d-inline-block mr-3">
										<img src="assets/img/profiles/img-6.jpg" alt="user avatar" class="rounded-circle img-fluid" width="55">
									</div>
								</a>
							</div>
							<div class="user-notification-block align-center">
								<div class="top-nav-search">
									<form>
										<input type="text" class="form-control" placeholder="Search here">
										<button class="btn" type="submit"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
							<hr>
							<div class="user-menu-items px-3 m-0">
								<a class="px-0 pb-2 pt-0" href="index.html">
									<span class="media align-items-center">
										<span class="lnr lnr-home mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Dashboard</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="employees.html">
									<span class="media align-items-center">
										<span class="lnr lnr-users mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Employees</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="company.html">
									<span class="media align-items-center">
										<span class="lnr lnr-apartment mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Company</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="calendar.html">
									<span class="media align-items-center">
										<span class="lnr lnr-calendar-full mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Calendar</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="leave.html">
									<span class="media align-items-center">
										<span class="lnr lnr-briefcase mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Leave</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="reviews.html">
									<span class="media align-items-center">
										<span class="lnr lnr-star mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Reviews</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="reports.html">
									<span class="media align-items-center">
										<span class="lnr lnr-rocket mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Reports</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="manage.html">
									<span class="media align-items-center">
										<span class="lnr lnr-sync mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Manage</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="settings.html">
									<span class="media align-items-center">
										<span class="lnr lnr-cog mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Settings</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="employment.html">
									<span class="media align-items-center">
										<span class="lnr lnr-user mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Profile</span>
										</span>
									</span>
								</a>
								<a class="p-2" href="login.html">
									<span class="media align-items-center">
										<span class="lnr lnr-power-switch mr-3"></span>
										<span class="media-body text-truncate text-left">
											<span class="text-truncate text-left">Logout</span>
										</span>
									</span>
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</header>
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
				<aside class="sidebar sidebar-user">
					<div class="card ctm-border-radius shadow-sm grow">
						<div class="card-body py-4">
							<div class="row">
								<div class="col-md-12 mr-auto text-left">
									<div class="custom-search input-group">
										<div class="custom-breadcrumb">
											<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
												<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Home</a></li>
												<li class="breadcrumb-item d-inline-block active">Calendar</li>
											</ol>
											<h4 class="text-dark">Calendar</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Sidebar -->
					<div class="sidebar-wrapper d-lg-block d-md-none d-none">
						<div class="card ctm-border-radius shadow-sm grow border-none">
							<div class="card-body">
								<div class="row no-gutters">
									<div class="col-6 align-items-center text-center">
										<a href="index.html" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="employees.html" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="company.html" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class="">Company</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="calendar.html" class="text-white active p-4 ctm-border-right"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="leave.html" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="reviews.html" class="text-dark p-4 ctm-border-right"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="reports.html" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="manage.html" class="text-dark p-4 ctm-border-right"><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manage</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="settings.html" class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span></a>
									</div>
									<div class="col-6 align-items-center shadow-none text-center">
										<a href="employment.html" class="text-dark p-4 last-slider-btn ctm-border-right"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- /Sidebar -->
					<div class="card ctm-border-radius shadow-sm grow">
						<div class="card-body">
							<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white btn-block" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
						</div>
					</div>
					<div class="card ctm-border-radius shadow-sm grow">
						<div class="card-body">
							<h4 class="card-title">Drag & Drop Event</h4>
							<div id="calendar-events" class="mb-3">
								<div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> My Event One</div>
								<div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> My Event Two</div>
								<div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> My Event Three</div>
								<div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> My Event Four</div>
							</div>
							<div class="checkbox  mb-3">
								<input id="drop-remove" type="checkbox">
								<label for="drop-remove">
									Remove after drop
								</label>
							</div>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#add_new_event" class="btn mb-3 btn-theme text-white ctm-border-radius btn-block">
								<i class="fa fa-plus"></i> Add Category
							</a>
						</div>
					</div>
				</aside>
			</div>

			<div class="col-xl-9 col-lg-8  col-md-12">

				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-body">
						<div id="calendar"></div>
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

<!-- Add Event Modal -->
<div id="add_event" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Event Name <span class="text-danger">*</span></label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Event Date <span class="text-danger">*</span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Category</label>
						<select class="form-control select" name="category">
							<option value="bg-danger">Danger</option>
							<option value="bg-success">Success</option>
							<option value="bg-purple">Purple</option>
							<option value="bg-primary">Primary</option>
							<option value="bg-info">Info</option>
							<option value="bg-warning">Warning</option>
						</select>
					</div>
					<div class="submit-section text-center">
						<button class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Event Modal -->

<!-- Add Event Modal -->
<div class="modal fade none-border" id="my_event" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Event</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-theme ctm-border-radius text-white save-event submit-btn button-1">Create event</button>
				<button type="button" class="btn btn-danger ctm-border-radius delete-event submit-btn" data-dismiss="modal">Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- /Add Event Modal -->

<!-- Add Category Modal -->
<div class="modal fade" id="add_new_event">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Category Name</label>
						<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
					</div>
					<div class="form-group mb-0">
						<label>Choose Category Color</label>
						<select class="form-control select form-white" data-placeholder="Choose a color..." name="category-color">
							<option value="success">Success</option>
							<option value="danger">Danger</option>
							<option value="info">Info</option>
							<option value="primary">Primary</option>
							<option value="warning">Warning</option>
							<option value="inverse">Inverse</option>
						</select>
					</div>
					<div class="submit-section text-center">
						<button type="button" class="btn btn-theme ctm-border-radius text-white save-category submit-btn mt-3 button-1" data-dismiss="modal">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Category Modal -->
<?php require "layouts/footer.php" ?>