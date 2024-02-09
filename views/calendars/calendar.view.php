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
								<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" >
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