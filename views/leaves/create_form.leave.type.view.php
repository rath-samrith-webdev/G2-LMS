<?php
require "layouts/header.php";
require 'layouts/navbar.php';
?>
<!-- Main Wrapper -->

<form action="controllers/leaves/add.leave.type.controller.php" class="col-xl-9 col-lg-8 col-md-12" method="post">
<div class="row">
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Apply Leave types</h4>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-12 leave-col">
							<div class="form-group">
								<label>Type Name</label>
								<input type="text" class="form-control" name="typename" placeholder="Enter you type name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group mb-0">
								<label>Description</label>
								<textarea class="form-control" name="typedesc" rows=4></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Add</button>
					<a href="/leavetype" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
				</div>
			</div>
		</div>
	</div>
</form>
<?php require "layouts/footer.php"; ?>