<?php 
require "layouts/header.php";
require "layouts/navbar.php";?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="col-md-12">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title mb-0">Today Leaves</h4>
                <a href="/leavetypeForm">Add Leave Type</a>
            </div>
            <div class="card-body">
                <div class="employee-office-table">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <!-- <th>From</th>
										<th>To</th>
										<th>Days</th>
										<th>Remaining Days</th> -->
                                    <!-- <th>Notes</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="employment.html" class="avatar"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></a>
                                        <h2><a href="employment.html">Danny Ward</a></h2>
                                    </td>
                                    <!-- <td></td> -->
                                    <td>05 Dec 2019</td>
                                    <!-- <td>07 Dec 2019</td>
										<td>3</td>
										<td>9</td>
										<td>Parenting Leave</td> -->
                                    <td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
                                    <td class="text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                            <span class="lnr lnr-trash"></span> Delete
                                        </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php";?>