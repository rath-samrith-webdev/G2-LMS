<?php
require "database/database.php";
require "models/leave_request.model.php";

// ======== Capture function leave request model =========
$leaves=getLeaveData();
$leave_requests=getALlleaves();

require "views/leaves/leave.view.php";



