<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
// ======== Capture function leave request model =========
$leaves = getLeaveData();
$leave_requests = getALlleaves();
$leaveTypes = getAlltypes();

require "views/leaves/leave.view.php";
