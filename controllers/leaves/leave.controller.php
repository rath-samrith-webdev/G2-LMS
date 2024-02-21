<?php
require "database/database.php";
require "models/leave_request.model.php";
$leaves=getLeaveData();
$leave_requests=getALlleaves();
require "views/leaves/leave.view.php";



