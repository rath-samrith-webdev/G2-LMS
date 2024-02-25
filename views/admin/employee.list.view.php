<?php
require "layouts/header.php";
require "layouts/navbar.php"; ?>

<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5"><a href="employees.html" class="text-white">All</a></li>
                <li class="list-group-item text-center button-6"><a class="text-dark" href="employees-team.html">Teams</a></li>
                <li class="list-group-item text-center button-6"><a class="text-dark" href="employees-offices.html">Offices</a></li>
            </ul>
        </div>
    </div>
    <div class="card shadow-sm grow ctm-border-radius">
        <div class="card-body align-center">
            <h4 class="card-title float-left mb-0 mt-2"><?= count($allemployee) ?> People</h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                <li class="nav-item">
                    <a class="nav-link active border-0 font-23 grid-view" href="employees.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0 font-23 list-view" href="employees-list.html"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item pl-3">
                    <a href="add-employee.html" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="ctm-border-radius shadow-sm grow card">
        <div class="card-body">
            <div class="row people-grid-row">
                <?php foreach ($allemployee as $employee) { ?>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content text-center">
                                    <div class="profile-info-widget">
                                        <a href="/profiles?uid=<?= $employee['uid'] ?>" class="booking-doc-img">
                                            <img src="<?= $employee['profile'] ?>" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h4><a href="employment.html" class="text-primary"><?= $employee['first_name'] . " " . $employee['last_name'] ?></a></h4>
                                            <div>
                                                <p class="mb-0"><b>PHP Team Lead</b></p>
                                                <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0964687b60686a667d7d6667496c71686479656c276a6664">[email&#160;protected]</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php require "layouts/footer.php" ?>