<?php
include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
		<div class="card-body">
			<div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Overview</a>
				<a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Review Types</a>
			</div>
		</div>
	</div>
	<div class="card shadow-sm ctm-border-radius grow">
		<div class="card-header d-flex align-items-center justify-content-between">
			<h4 class="card-title mb-0 d-inline-block">Reviews</h4>
			<a href="/reviewForm" class="btn btn-theme button-1 ctm-border-radius text-white float-right"><span></span> Create Review</a>
		</div>
		<div class="card-body align-center">
			<div class="tab-content" id="v-pills-tabContent">

				<!-- Tab1-->
				<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">

							<table class="table custom-table table-hover">
								<thead>
									<tr>
										<th>Review Name</th>
										<th>Reviewers</th>
										<th>Begin On</th>
										<th>Due By</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<!-- ==========Get all reviews========= -->
									<?php foreach ($reviews as $review) { ?>
										<tr>
											<td><?= $review['reviewType_name'] ?></td>
											<td>
												<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="<?= $review['profile'] ?>"></a>
												<h2><a href="employment.html"> <?= $review['first_name'] . ' ' . $review['last_name'] ?></a></h2>
											</td>
											<td><?= $review['start_date'] ?></td>
											<td><?= $review['end_date'] ?></td>
											<td>
												<!-- ==========Get reviews select all=========== -->
												<form action="controllers/reviews/edit.status.review.controller.php" class="d-flex justify-content-between" method="post">
													<input type="hidden" value="<?= $review['review_id'] ?>" name="review_id">
													<select name="status_id" class="form-control">
														<?php foreach ($review_status as $status) {
															if ($status['status_name'] == $status['status_name']) { ?>
																<option value="<?= $status["status_id"] ?>" selected><?= $status['status_name'] ?></option>
															<?php  } else { ?>
																<option value="<?= $status["status_id"] ?>"><?= $status['status_name'] ?></option>
														<?php }
														} ?>
													</select>
													<button class="btn btn-theme button-1 text-white">Save</button>
												</form>
											</td>
											<td>
												<div class="table-action">
													<!-- ==========btn edit review=========== -->
													<form action="/editReview" method="post" class="btn btn-sm">
														<input type="hidden" value="<?= $review['review_id'] ?>" name="id">
														<button type="submit" class="btn-sm btn-outline-success"><span class="lnr lnr-pencil"></span> Edit</button>
													</form>
													<a href="#" class="btn btn-sm btn-outline-danger deletebtn" data-target="#delete">
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
				<!--/Tab 1-->

				<!-- Tab2-->
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Created By</th>
										<th>Scheduled For</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<!-- ===get all review types=== -->
									<?php foreach ($review_type as $type) { ?>
										<tr>
											<td>
												<?= $type['reviewType_name']?>
											</td>
											<td>
												<a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="<?= $type['profile'] ?>"></a>
												<h2><a href="employment.html"> <?= $type['first_name'] . ' ' . $type['last_name'] ?></a></h2>
											</td>
											<td> Everyone </td>
											<td>
												<div class="table-action">
													<a href="/editReviewType" class="btn btn-sm btn-outline-success">
														<span class="lnr lnr-pencil"></span> Edit
													</a>
													<a href="#" class="btn btn-sm btn-outline-danger deletebtnReviewTypes" data-target="#delete"">
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
				<!-- /Tab 2-->

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

<!--Delete The Modal Overview -->
<div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Remove reviews</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controllers/reviews/delete.review.controller.php?id=<?= $review['review_id'] ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="request_id" id="request_id">
					<h6> Are you sure you want to delete this reviews</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
					<button type="submit" name="deletedata" class="btn btn-outline-danger"> Remove </button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>