<?php
require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5">
                    <a class="text-white" href="/employees">Employees Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Total Leave</h4>
                    <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body text-center">
                    <div class="time-list">
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">0</span>
                            <p class="mb-0">Approved Request</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">0</span>
                            <p class="mb-0">Pending</p>
                        </div>
                        <div class="dash-stats-list">
                            <span class="btn btn-outline-primary">0</span>
                            <p class="mb-0">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex">
            <div class="card shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">Today</h4>
                    <a href="/manages" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
                </div>
                <div class="card-body recent-activ">

                    <div class="today_leave">
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
                        <a href="javascript:void(0)" class="dash-card text-dark">
                            <div class="dash-card-container">
                                <div class="dash-card-icon text-warning">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">You are on <b><?= $leaves['leaveType_desc'] ?></b> Today</h6>
                                </div>
                                <div class="dash-card-avatars">
                                    <div class="e-avatar"><img class="img-fluid" src="<?= $leaves['profile'] ?>" alt="Avatar"></div>
                                </div>
                            </div>
                        </a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Team Leads List -->
            <div class="card flex-fill team-lead shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block"> Team Members</h4>
                    <!-- <a href="employees-team.html" class="dash-card d-inline-block float-right mb-0 text-primary">Manage Team -->
                    </a>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="e-avatar avatar-online mr-3">
                            <img src="<?= $employee['profile'] ?>" alt="Maria Cotton" class="img-fluid" />
                        </div>
                        <div class="media-body">
                            <h6 class="m-0"><?= $employee['first_name'] . "  " . $employee['last_name'] ?></h6>
                            <p><?= $employee['user_email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Recent Activities -->
            <div class="card recent-acti flex-fill shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                        Your Recent Activities
                    </h4>
                    <a href="/manages" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
                </div>
                <div class="card-body recent-activ admin-activ">
                    <div class="recent-comment">
                    </div>
                </div>
            </div>
        </div>
        <!-- / Recent Activities -->
        <div class="col-lg-6 col-md-12 d-flex">
            <!-- Today -->
            <div class="card flex-fill today-list shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                        Your Upcoming Leave
                    </h4>
                    <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="fa fa-suitcase"></i></a>
                </div>
                <div class="card-body recent-activ">
                    <div class="upcoming-leave">
                        <a href="javascript:void(0)" class="dash-card text-danger">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Mon, 16 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Mon, 23 Dec 2019</h6>
                                </div>
                            </div>
                        </a>

                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Wed, 25 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Fri, 27 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                        <hr />
                        <a href="javascript:void(0)" class="dash-card text-primary">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase"></i>
                                </div>
                                <div class="dash-card-content">
                                    <h6 class="mb-0">Tue, 31 Dec 2019</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Content-->
<?php require "layouts/footer.php"; ?>