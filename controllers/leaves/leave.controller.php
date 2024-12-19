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
if (isset($_SESSION['user']['id']) and $_SESSION['user']['role_name'] == 'Manager') {
    $id = $_SESSION['user']['id'];
    $role_id = $_SESSION['user']['role_name'];
    $dept_id = $_SESSION['user']['company_id'];
    if ($role_id == 1) {
        $leave_requests = getDepartRequest($dept_id);
    } else {
        $leave_requests = getPersonalLeaves($id);
    } // Get the leaves of current user from database
} else {
    $leave_requests = getALlleaves(); //get all request for admin
}
require "views/leaves/leave.view.php";
