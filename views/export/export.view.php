<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="col-md-12">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title mb-0">Download requests</h4>
                <button id="download" class="btn btn-theme button-1 text-white">Export report</button></a>
            </div>
            <div class="card-body">
                <div class="employee-office-table">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0" id="leave_request">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th colspan="2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($leave_requests as $request) { ?>
                                    <tr>
                                        <td><?= $request['request_id'] ?></td>
                                        <td>
                                            <h2>
                                                <a href="employment.html"><?= $request['first_name'] . " " . $request['last_name'] ?></a>
                                            </h2>
                                        </td>
                                        <td><?= $request['leaveType_desc'] ?></td>
                                        <td><?= $request['start_date'] ?></td>
                                        <td><?= $request['end_date'] ?></td>
                                        <td>
                                            <?= $request['status_desc'] ?>
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