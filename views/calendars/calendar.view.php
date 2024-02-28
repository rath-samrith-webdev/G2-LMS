<?php
require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
		<div class="card-body">
			<ul class="list-group list-group-horizontal-lg d-flex justify-content-between">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#add_new_event" class="list-group btn mb-3 btn-theme text-white ctm-border-radius btn-block">
					<i class="fa fa-plus"></i> Add Category </a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Calendar</h4>
				</div>
				<div class="card-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="col-xl-9 col-lg-8  col-md-12">
	<div class="card ctm-border-radius shadow-sm grow">
		<div class="card-body">
			<div id="calendar"></div>
		</div>
	</div>
</div> -->
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

<!-- <div class="sidebar-overlay" id="sidebar_overlay"></div> -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="vendor/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="vendor/js/popper.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>

<!-- Chart JS -->
<script src="vendor/js/Chart.min.js"></script>
<script src="vendor/js/chart.js"></script>

<!-- Datetimepicker JS -->
<script src="vendor/plugins/select2/moment.min.js"></script>
<script src="vendor/js/bootstrap-datetimepicker.min.js"></script>

<!-- Select2 JS -->
<script src="vendor/plugins/select2/select2.min.js"></script>

<!-- Full Calendar JS -->
<script src="vendor/js/jquery-ui.min.js"></script>

<script src="vendor/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendor/plugins/fullcalendar/jquery.fullcalendar.js"></script>

<!-- Sticky sidebar JS -->
<script src="vendor/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="vendor/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Custom Js -->
<script src="vendor/js/script.js"></script>

</body>

</html>