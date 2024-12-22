<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
require "models/admin.model.php";
// ======== Capture function leave request model =========
$leaves = getLeaveData();
$leave_requests = [];
$leaveTypes = getAlltypes();
// ======== Capture function leave request model =========
$leaves = getLeaveData();
$id = $_SESSION['user']['id'];
$role_id = $_SESSION['user']['role_name'];
$dept_id = $_SESSION['user']['company_id'];
if ($role_id == 'Manager') {
    $leave_requests = getDepartRequest($id);
    require "views/leaves/leave.view.php";
    return;
}
if (isset($_SESSION['user']['role_name']) && $role_id === 'Administrator') {
    $leave_requests = getALlleaves();
    require "views/leaves/leave.view.php";
    return;
}
$leave_requests = getALluserleaves($id);
require "views/leaves/leave.view.php";
