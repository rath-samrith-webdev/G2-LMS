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
                    <a href="/createEmployee" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
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
                                            <h4><?= $employee['first_name'] . " " . $employee['last_name'] ?></a></h4>
                                            <div>
                                                <p class="mb-0"><b><?= $employee['position_name'] ?></b></p>
                                                <!-- <p class="mb-0 ctm-text-sm"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0964687b60686a667d7d6667496c71686479656c276a6664">[email&#160;protected]</a></p> -->
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn text-center btn-theme text-white detail<?= $employee['uid'] ?>">Detail</button>
                                    <button type="button" class="btn btn-theme text-white edit<?= $employee['uid'] ?>">Edit</button>
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

<?php foreach ($allemployee as $employee) { ?>
    <div class="modal fade " id="detail<?= $employee['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex text-black ">
                        <div class="flex-shrink-0">
                            <img src="<?= $employee['profile'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3 ml-4">
                            <h5 class="mb-1">Full Name: <?= $employee['first_name'] . " " . $employee['last_name'] ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Postion: <?= $employee['position_name'] ?></p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Date of birth</p>
                                    <p class="mb-0"><?= $employee['date_of_birth'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Departments</p>
                                    <p class="mb-0"><?= $employee['department_name'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Total allowed leaves</p>
                                    <p class="mb-0"><?= $employee['total_allowed_leave'] ?></p>
                                </div>
                                <div>
                                    <p class="small text-muted mb-1">Salary</p>
                                    <p class="mb-0"><?= $employee['salary'] ?></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Email</p>
                                    <p class="mb-0"><?= $employee['email'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Phone</p>
                                    <p class="mb-0"><?= $employee['phone_number'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Role</p>
                                    <p class="mb-0"><?= $employee['role_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="edit<?= $employee['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="d-flex text-black ">
                        <div class="flex-shrink-0">
                            <img src="<?= $employee['profile'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                            <input type="file" name="profile" style="display:none">
                        </div>
                        <div class="flex-grow-1 ms-3 ml-4">
                            <h5 class="mb-1">Details</h5>
                            <div class="d-flex">
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">First Name *</label>
                                    <input type="text" class="form-control" name='first_name' id="first_name" value="<?= $employee['first_name'] ?>">
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Last Name *</label>
                                    <input type="text" class="form-control" name='last_name' id="last_name" value="<?= $employee['last_name'] ?>">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="form-group">
                                    <label for="first_name">Email *</label>
                                    <input type="text" class="form-control" name='first_name' id="first_name" value="<?= $employee['email'] ?>">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="form-group">
                                    <label for="first_name">Date of birth *</label>
                                    <input type="text" class="form-control datetimepicker" name='first_name' id="first_name" value="<?= $employee['date_of_birth'] ?>">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Postion *</label>
                                    <select class="select form-control" name="position" id="position">
                                        <?php foreach ($positions as $position) {
                                            if ($position['position_id'] == $employee['position_id']) { ?>
                                                <option selected value="<?= $position['position_id'] ?>"><?= $position['position_name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $position['position_id'] ?>"><?= $position['position_name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Role *</label>
                                    <select class="select form-control" name="position" id="position">
                                        <?php foreach ($roles as $role) {
                                            if ($role['role_id'] == $employee['role_id']) { ?>
                                                <option selected value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Manager *</label>
                                    <select class="select form-control" name="position" id="position">
                                        <?php foreach ($managers as $manager) {
                                            if ($manager['uid'] == $employee['user_manager_id']) { ?>
                                                <option selected value="<?= $manager['uid'] ?>"><?= $manager['first_name'] . " ", $manager['last_name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $manager['uid'] ?>"><?= $manager['first_name'] . " ", $manager['last_name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Departments *</label>
                                    <select class="select form-control" name="position" id="position">
                                        <?php foreach ($deparments as $dept) {
                                            if ($dept['department_id'] == $employee['user_department_id']) { ?>
                                                <option selected value="<?= $dept['department_id'] ?>"><?= $dept['department_name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $dept['department_id'] ?>"><?= $dept['department_name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex pt-1">
                                <button type="submit" class="btn btn-outline-primary me-1 flex-grow-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php require "layouts/footer.php" ?>
<?php foreach ($allemployee as $employee) { ?>
    <script>
        $(document).ready(function() {
            $(".detail<?= $employee['uid'] ?>").on("click", function() {
                $("#detail<?= $employee['uid'] ?>").modal("show");
                console.log(data);
            });
        });
        $(document).ready(function() {
            $(".edit<?= $employee['uid'] ?>").on("click", function() {
                $("#edit<?= $employee['uid'] ?>").modal("show");
                console.log(data);
            });
        });
    </script>
<?php } ?>