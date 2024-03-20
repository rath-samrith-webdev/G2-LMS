<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
$leaverequest = [];
if (isset($_SESSION['user']['uid'])) {
    $id = $_SESSION['user']['uid'];
    $role_id = $_SESSION['user']['role_id'];
    $dept_id = $_SESSION['user']['department_id'];
    if ($role_id == 1) {
        $leaverequest = getDepartRequest($dept_id);
    } else {
        $leaverequest = getALluserleaves($id);
    } //get all leaves of the user from database
} elseif (isset($_SESSION['user']['admin_username'])) {
    $leaverequest = getALlleaves();
}
$leaveTypes = getAlltypes();
require "views/calendars/calendar.view.php";
