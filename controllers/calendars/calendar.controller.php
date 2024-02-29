<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
if (isset($_SESSION['user']['uid'])) {
    $id=$_SESSION['user']['uid'];
    $leaverequest = getALluserleaves($id);  //get all leaves of the user from database
} else {
    $leaverequest = getALlleaves();
}
$leaveTypes = getAlltypes();
require "views/calendars/calendar.view.php";
