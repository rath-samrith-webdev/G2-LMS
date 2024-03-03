<?php
require "database/database.php";
require "models/leave_request.model.php";
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$uid = $_SESSION['user']['uid'];
$todayLeaves = getuserLeaveToday($uid, $currentDate);
require "views/employees/employee.view.php";
