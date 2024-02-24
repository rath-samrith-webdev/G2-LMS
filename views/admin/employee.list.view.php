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
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-6.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Maria Cotton</a></h4>
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
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-5.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Danny Ward</a></h4>
                                        <div>
                                            <p class="mb-0"><b>Designing Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7b1f1a1515020c1a091f3b1e031a160b171e55181416">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-4.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Linda Craver</a></h4>
                                        <div>
                                            <p class="mb-0"><b>IOS Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="670b0e09030604150611021527021f060a170b024904080a">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-3.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Jenni Sims</a></h4>
                                        <div>
                                            <p class="mb-0"><b>Android Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d9b3bcb7b7b0aab0b4aa99bca1b8b4a9b5bcf7bab6b4">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-2.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">John Gibbs</a></h4>
                                        <div>
                                            <p class="mb-0"><b> Business Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a9c3c6c1c7cddbd0dacdc8c5cce9ccd1c8c4d9c5cc87cac6c4">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-8.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Stacey Linville</a></h4>
                                        <div>
                                            <p class="mb-0"><b> Testing Team Lead</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e390978280869a8f8a8d958a8f8f86a3869b828e938f86cd808c8e">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile last-card-row">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-10.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Richard Wilson</a></h4>
                                        <div>
                                            <p class="mb-0"><b> Operation Manager</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e3918a808b829187948a8f908c8da3869b828e938f86cd808c8e">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile last-card-row">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-15.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Daniel Griffing</a></h4>
                                        <div>
                                            <p class="mb-0"><b> Designing Team</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cfabaea1a6aaa3a8bda6a9a9a6a1a88faab7aea2bfa3aae1aca0a2">[email&#160;protected]</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="card widget-profile last-card-row1">
                        <div class="card-body">
                            <div class="pro-widget-content text-center">
                                <div class="profile-info-widget">
                                    <a href="employment.html" class="booking-doc-img">
                                        <img src="assets/img/profiles/img-14.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h4><a href="employment.html" class="text-primary">Michelle Fairfax</a></h4>
                                        <div>
                                            <p class="mb-0"><b>PHP Team</b></p>
                                            <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ef3f7fdf6fbf2f2fbf8fff7ecf8ffe6defbe6fff3eef2fbb0fdf1f3">[email&#160;protected]</a></p>
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
</div>
<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php require "layouts/footer.php" ?>