<?php
require "layouts/header.php";
require "layouts/navbar.php"; ?>

<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
        <div class="card-body">
            <ul class="list-group list-group-horizontal-lg">
                <li class="list-group-item text-center active button-5"><a href="/employeelist" class="text-white">All users</a></li>
            </ul>
        </div>
    </div>
    <div class="card shadow-sm grow ctm-border-radius">
        <div class="card-body align-center">
            <h4 class="card-title float-left mb-0 mt-2"><?= count($allemployee) ?> People</h4>
            <ul class="nav nav-tabs float-right border-0 tab-list-emp">
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
                                        <a href="/profiles?uid=<?= $employee['user_id'] ?>" class="booking-doc-img">
                                            <img src="<?= $employee['profile_img'] ?>" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h4><?= $employee['first_name'] . " " . $employee['last_name'] ?></a></h4>
                                            <div>
                                                <p class="mb-0"><b><?= $employee['role_name'] ?></b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger me-1 flex-grow-1 remove<?= $employee['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn text-center btn-theme text-white detail<?= $employee['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-theme text-white edit<?= $employee['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
    <div class="modal fade " id="detail<?= $employee['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <img src="<?= $employee['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3 ml-4">
                            <h5 class="mb-1">Full Name: <?= $employee['first_name'] . " " . $employee['last_name'] ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;">Postion: <?= $employee['position_name'] ?></p>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Date of birth</p>
                                    <p class="mb-0"><?= date("Y-m-d", strtotime($employee['date_of_birth'])) ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Departments</p>
                                    <p class="mb-0"><?= $employee['department_name'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Total allowed leaves</p>
                                    <p class="mb-0">10</p>
                                </div>
                                <div>
                                    <p class="small text-muted mb-1">Salary</p>
                                    <p class="mb-0">5000</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Email</p>
                                    <p class="mb-0"><?= $employee['email'] ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Phone</p>
                                    <p class="mb-0">0991</p>
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
    <div class="modal fade " id="edit<?= $employee['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/admin/edit.employee.process.php" method="post" class="d-flex text-black ">
                        <input type="hidden" value='<?= $employee['user_id'] ?>' name='user_id'>
                        <div class="flex-shrink-0">
                            <img src="<?= $employee['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid" style="width: 180px; border-radius: 10px;">
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
                                    <input type="text" class="form-control" name='email' id="email" value="<?= $employee['email'] ?>">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="form-group">
                                    <label for="first_name">Date of birth *</label>
                                    <input type="text" class="form-control datetimepicker" name='date_of_birth' id="first_name" value="<?= date(strtotime($employee['date_of_birth'])) ?>">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Postion *</label>
                                    <select class="selectpicker form-control" name="position" id="position">
                                        <?php foreach ($positions as $position) {
                                            if ($position['id'] == $employee['position_id']) { ?>
                                                <option selected value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Role *</label>
                                    <select class="selectpicker form-control" name="roles" id="position">
                                        <?php foreach ($roles as $role) {
                                            if ($role['id'] == $employee['role_id']) { ?>
                                                <option selected value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="form-group flex-grow-1">
                                    <label for="first_name">Manager *</label>
                                    <select class="selectpicker form-control" name="manager" id="position">
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
                                    <select class="form-control selectpicker" name="department" id="position" data-live-search="true">
                                        <?php foreach ($deparments as $dept) {
                                            if ($dept['id'] == $employee['department_id']) { ?>
                                                <option selected value="<?= $dept['id'] ?>"><?= $dept['name'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $dept['id'] ?>"><?= $dept['name'] ?></option>
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
    <div class="modal fade" id="staticBackdrop<?= $employee['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remove <?= $employee['first_name'] . " " . $employee['last_name'] ?></h5>
                </div>
                <form action="controllers/admin/employee.removal.php" method="post">
                    <input type="hidden" name="emID" value='<?= $employee['id'] ?>'>
                    <div class="modal-body">
                        <p>Employee name <?= $employee['first_name'] . " " . $employee['last_name'] ?> will be deleted</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Understood</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<?php require "layouts/footer.php" ?>
<?php foreach ($allemployee as $employee) { ?>
    <?= $employee['id'] ?>
    <script>
        $(document).ready(function() {
            $(".detail<?= $employee['id'] ?>").on("click", function() {
                $("#detail<?= $employee['id'] ?>").modal("show");
            });
            $(".edit<?= $employee['id'] ?>").on("click", function() {
                $("#edit<?= $employee['id'] ?>").modal("show");
            });
            $(".remove<?= $employee['id'] ?>").on("click", function() {
                $("#staticBackdrop<?= $employee['id'] ?>").modal("show");
            });
        });
    </script>
<?php } ?>
<?php
if (isset($_GET['delete']) and $_GET['delete'] == 1) { ?>
    <script>
        $.notify("Employee has been removed successfully", "success");
    </script>
<?php } ?>