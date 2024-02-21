<?php
require "layouts/header.php";
require "layouts/navbar.php"; ?>
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
                                    <th>Type ID</th>
                                    <th>Type Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($leaveTypes as $type) { ?>
                                    <tr>
                                        <td>
                                            <h2><?=$type['leaveType_id']?></h2>
                                        </td>
                                        <td><?=$type['leaveType_desc']?></td>
                                        <td><a href="/editLeaveType?id=<?=$type['leaveType_id']?>" class="btn btn-theme ctm-border-radius text-white btn-sm">Edit</a></td>
                                        <td class="text-danger">
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                <span class="lnr lnr-trash"></span> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>