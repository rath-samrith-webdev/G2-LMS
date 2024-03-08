<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/leavetype.model.php";
$leaves = getLeaveData();
$leave_requests = getALlleaves();
$leaveTypes = getAlltypes();
require "views/export/export.view.php";
