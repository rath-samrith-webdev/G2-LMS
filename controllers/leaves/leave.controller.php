<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/admin.model.php";

// ======== Capture function leave request model =========
$leaves = getLeaveData();
if (isset($_SESSION['user']['uid'])) {
    $id = $_SESSION['user']['uid'];
    $leave_requests = getPersonalLeaves($id);
} else {
    $leave_requests = getALlleaves();
}
require "views/leaves/leave.view.php";
