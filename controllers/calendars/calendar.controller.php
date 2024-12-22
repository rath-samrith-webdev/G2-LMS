<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
$leaverequest = [];
$leaveTypes = getAlltypes();
if (isset($_SESSION['user']['id'])) {
    $id = $_SESSION['user']['id'];
    $role_id = $_SESSION['user']['role_name'];
    $dept_id = $_SESSION['user']['company_id'];
    if ($role_id == 'Manager') {
        $leaverequest = getDepartRequest($id);
        require "views/calendars/calendar.view.php";
        return;
    }
    if (isset($_SESSION['user']['role_name']) && $role_id === 'Administrator') {
        $leaverequest = getALlleaves();
        require "views/calendars/calendar.view.php";
        return;
    }
    $leaverequest = getALluserleaves($id);
    require "views/calendars/calendar.view.php";
}
