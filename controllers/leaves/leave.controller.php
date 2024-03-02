<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/admin.model.php";

// ======== Capture function leave request model =========
$leaves = getLeaveData();
if (isset($_SESSION['user']['uid']) and isset($_SESSION['user']['email'])) {
    $id = $_SESSION['user']['uid'];
    $leave_requests = getPersonalLeaves($id); // Get the leaves of current user from database
} else {
    $leave_requests = getALlleaves(); //get all request for admin
}
require "views/leaves/leave.view.php";
