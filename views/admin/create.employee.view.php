<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="accordion add-employee" id="accordion-details">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="basic1">
                <h4 class="cursor-pointer mb-0">
                    <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                        Basic Details
                        <br><span class="ctm-text-sm">Organized and secure.</span>
                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
                    <form action="../../controllers/admin/create.user.controller.php" method="post">
                        <div class="row">
                            <div class="col-12 form-group">
                                <?php if (isset($_GET['error1'])) { ?>
                                    <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error1']; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="fsname">
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="lsname">
                            </div>
                            <div class="col-12 form-group">
                                <?php if (isset($_GET['error2'])) { ?>
                                    <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error2']; ?></p>
                                <?php } ?>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="col-12 form-group">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error']; ?></p>
                                <?php } ?>
                                <input type="password" class="form-control" placeholder="Password" name="password" minlength="8">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Date of birth" name="datofbirth">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="col-md-12 form-group ">
                                <select class="form-control select" name="gen">
                                    <option selected>Gender </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="roles">
                                    <option selected>User role</option>
                                    <?php foreach ($roles as $role) { ?>
                                        <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="positions">
                                    <option selected>Position</option>
                                    <?php foreach ($positions as $position) { ?>
                                        <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="departments">
                                    <option selected>Department</option>
                                    <?php foreach ($departments as $department) { ?>
                                        <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="manager">
                                    <option selected>Manager</option>
                                    <?php foreach ($managers as $manager) { ?>
                                        <option value="<?= $manager['uid'] ?>"><?= $manager['first_name'] . " " . $manager['last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <select class="form-control select" name="salary">
                                    <option selected>Salary </option>
                                    <option value="250">250$</option>
                                    <option value="300">300$</option>
                                    <option value="350">350$</option>
                                    <option value="400">400$</option>
                                    <option value="450">450$</option>
                                    <option value="500">500$</option>
                                    <option value="600">600$</option>
                                    <option value="700">700$</option>
                                    <option value="1000">1000$</option>
                                    <option value="2000">2000$</option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <input type="leaves" class="form-control" placeholder="Total allow leave" name="leaves">
                            </div>
                        </div>
                        <a href="/manages"><button class="btn btn-theme text-white ctm-border-radius button-1">Add Team Member</button></a>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <?php require "layouts/footer.php"; ?>