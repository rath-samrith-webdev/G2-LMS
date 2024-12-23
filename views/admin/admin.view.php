<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>

<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
		<div class="card-body">
			<ul class="list-group list-group-horizontal-lg">
				<li class="list-group-item text-center active button-5"><a href="/admin" class="text-white">Admin Dashboard</a></li>
			</ul>
		</div>
	</div>
	<!-- Widget -->
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-primary">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Employees</h4>
						<p class="card-text"><?= count($allemployee) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-warning">
						<i class="fa fa-building-o"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Companies</h4>
						<p class="card-text">0</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-danger">
						<i class="fa fa-suitcase" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Leaves</h4>
						<p class="card-text"><?= count($allLeaves) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-success">
						<i class="fa fa-money" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Salary</h4>
						<p class="card-text">$5.8M</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / Widget -->

	<!-- Chart -->
	<div class="row">
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Total Employees</h4>
				</div>
				<div class="card-body">
					<canvas id="pieChart"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 d-flex">
			<div class="card ctm-border-radius shadow-sm flex-fill grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Requests Each Month</h4>
				</div>
				<div class="card-body">
					<canvas id="lineChart"></canvas>
				</div>
			</div>
		</div>
	</div>
	<!-- / Chart -->

	<div class="row">
		<div class="col-lg-6">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Today</h4>
					<a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
				</div>
				<div class="card-body recent-activ">
					<div class="today">
						<?php if ($usersBirthday) {
							foreach ($usersBirthday as $userBirth) { ?>
								<a href="javascript:void(0)" class="dash-card text-dark">
									<div class="dash-card-container">
										<div class="dash-card-icon text-primary">
											<i class="fa fa-birthday-cake" aria-hidden="true"></i>
										</div>
										<div class="dash-card-content">
											<h6 class="mb-0"><?= $userBirth['first_name'] ?> Birthdays Today</h6>
										</div>
									</div>
								</a>
								<hr />
							<?php }
						} else { ?>
							<a href="javascript:void(0)" class="dash-card text-dark">
								<div class="dash-card-container">
									<div class="dash-card-icon text-primary">
										<i class="fa fa-birthday-cake" aria-hidden="true"></i>
									</div>
									<div class="dash-card-content">
										<h6 class="mb-0">No Birthdays Today</h6>
									</div>
								</div>
							</a>
							<hr />
						<?php } ?>
						<?php
						foreach ($todayLeaves as $leaves) { ?>
							<a href="javascript:void(0)" class="dash-card text-dark">
								<div class="dash-card-container">
									<div class="dash-card-icon text-warning">
										<i class="fa fa-bed" aria-hidden="true"></i>
									</div>
									<div class="dash-card-content">
										<h6 class="mb-0"><?= $leaves['first_name'] ?> is on <b><?= $leaves['leaveType_desc'] ?></b> Today</h6>
									</div>
									<div class="dash-card-avatars">
										<div class="e-avatar"><img class="img-fluid" src="<?= $leaves['profile'] ?>" alt="Avatar"></div>
									</div>
								</div>
							</a>
							<hr>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 d-flex">

			<!-- Team Leads List -->
			<div class="card flex-fill team-lead shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Team Leads </h4>
					<a href="javascript:void(0)" class="dash-card float-right mb-0 text-primary">Manage Team </a>
				</div>
				<div class="card-body">
					<?php foreach ($teamLeads as $leader) { ?>
						<div class="media mb-3">
							<div class="e-avatar avatar-online mr-3"><img src="<?= $leader['profile_img'] ?>" alt="<?= $leader['first_name'] ?>" class="img-fluid"></div>
							<div class="media-body">
								<h6 class="m-0"><?= $leader['first_name'] . " " . $leader['last_name'] ?></h6>
								<p class="mb-0 ctm-text-sm"><?= $leader['department_name'] ?></p>
							</div>
						</div>
					<?php } ?>
					<hr>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-12 d-flex">
			<!-- Recent Activities -->
			<div class="card recent-acti flex-fill shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0 d-inline-block">Recent Activities</h4>
					<button id="refresh" class="btn d-inline-block float-right text-primary">
						Refresh
					</button>
				</div>
				<div class="card-body recent-activ admin-activ">
					<div class="recent-comment">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Content-->
<?php require "layouts/footer.php"; ?>