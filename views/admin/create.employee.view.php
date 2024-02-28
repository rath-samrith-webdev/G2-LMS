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
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="fsname">
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="lsname">
                            </div>
                            <div class="col-12 form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="col-12 form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Date of birth" name="datofbirth">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" placeholder="Phone Number" name="phone">
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="roles" >
                                    <option selected>Role OF User</option>
                                    <?php foreach ($roles as $role){?>
                                        <option value="<?=$role['role_id']?>"><?=$role['role_name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="positions">
                                    <option selected>Position</option>
                                    <?php foreach ($positions as $position){?>
                                        <option value="<?=$position['position_id']?>"><?=$position['position_name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="departments" >
                                    <option selected>Department</option>
                                    <?php foreach ($departments as $department){?>
                                        <option value="<?=$department['department_id']?>"><?=$department['department_name']?></option>
                                    <?php }?>
                                    
                                    
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Job Title">
                            </div>
            
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="manager" >
                                    <option selected>Line Manager</option>
                                    <option value="1">Robert Wilson</option>
                                    <option value="2">Maria Cotton</option>
                                    <option value="3">Danny Ward</option>
                                    <option value="4">Linda Craver</option>
                                    <option value="5">Jenni Sims</option>
                                    <option value="6">John Gibbs</option>
                                    <option value="7">Stacey Linville</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="office" >
                                    <option selected>Office Name</option>
                                    <option value="1">Focus Technology</option>
                                    <option value="1">Officer society</option>
                                    <option value="1">IT support</option>
                                    <option value="1">Controller</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group ">
                                <select class="form-control select" name="salary" >
                                    <option selected>Salay </option>
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
                                <input type="leaves" class="form-control" placeholder="total allow leave" name="leaves">
                            </div>
                            
            
                            <div class="col-md-12 ">
                                <div class=" custom-control custom-checkbox mb-0 ">
                                    <input type="checkbox" id="send-email" name="send-email" class="custom-control-input">
                                    <label class="mb-0 custom-control-label" for="send-email">Send them an invite email so they can log in immediately</label>
                                </div>
                            </div>
                        </div>
                        <a href="/manages"><button class="btn btn-theme text-white ctm-border-radius button-1">Add Team Member</button></a>
                    </form>

                    
                </div>
            </div>
        </div>
</div>
<?php require "layouts/footer.php"; ?>