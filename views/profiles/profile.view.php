<?php
include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white p-4 mb-4 card">
		<ul class="list-group list-group-horizontal-lg">
			<li class="list-group-item text-center active button-5"><a href="details.html" class="text-white">Detail</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
			<div class="card flex-fill ctm-border-radius shadow-sm grow">
				<input type="hidden" value="<?= $user['id'] ?>" name="uid">
				<div class="card-header">
					<h4 class="card-title mb-0">Basic Information</h4>
				</div>
				<div class="card-body text-center">
					<p class="card-text mb-3"><span class="text-primary">First Name :</span> <?= $user['first_name'] ?></p>
					<p class="card-text mb-3"><span class="text-primary">Last Name : </span><?= $user['last_name'] ?></p>
					<p class="card-text mb-3"><span class="text-primary">Date of Birth :</span> <?= $user['date_of_birth'] ?></p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
			<div class="card flex-fill  ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Contact</h4>
				</div>
				<div class="card-body text-center">
					<p class="card-text mb-3"><span class="text-primary">Phone Number : </span>099292920</p>
					<p class="card-text mb-3"><span class="text-primary">Personal Email : </span>
						<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dfb2beadb6bebcb0ababb0b19fbaa7beb2afb3baf1bcb0b2"><?= $user['email'] ?></a>
					</p>
					<p class="card-text mb-3"><span class="text-primary">Secondary Number : </span>986754231</p>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
			<div class="card flex-fill  ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Actions</h4>
				</div>
				<div class="card-body text-center">
					<a href="/editEmployee?uid=<?= $user['id'] ?>" class="btn btn-sm btn-outline-warning" data-target="#delete">
						<span class="lnr lnr-pencil"></span> Edit user
					</a>
					<a href="/" class="btn btn-sm btn-outline-danger" data-target="#delete">
						<span class="lnr lnr-trash"></span> Delete user
					</a>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
			<div class="card flex-fill  ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Profile Picture</h4>
				</div>
				<div class="card-body text-center">
					<img src="<?php echo (isset($user) && $_SESSION['user']['profile_img'] != "") ? $user['profile_img'] : 'views/landing/image.login.views.png'; ?>" alt="User Avatar" class="img-fluid rounded-circle" width="100">
					<a href="/profileImage?id=<?php echo $user['id'] ?>">Change Profile</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="deletebtn">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			?<form action="controllers/leaves/edit_leave_request.controller.php" method="post">
				<!-- Modal body -->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title mb-3">Are You Sure Want to Delete?</h4>
					<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-theme ctm-border-radius text-white text-center mb-2 button-1" data-dismiss="modal">Delete</button>
				</div>
				<!-- </form> -->
		</div>
	</div>
</div>
<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>