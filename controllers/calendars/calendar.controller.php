<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
$leaverequest = [];
if (isset($_SESSION['user']['id'])) {
    $id = $_SESSION['user']['id'];
    $role_id = $_SESSION['user']['role_name'];
    $dept_id = $_SESSION['user']['company_id'];
    if ($role_id == 'Manager') {
        $leaverequest = getDepartRequest($id);
    } else {
        $leaverequest = getALluserleaves($id);
    } //get all leaves of the user from database
}
if (isset($_SESSION['user']['role_name']) && $role_id === 'Administrator') {
    $leaverequest = getALlleaves();
}
$leaveTypes = getAlltypes();
require "views/calendars/calendar.view.php";
