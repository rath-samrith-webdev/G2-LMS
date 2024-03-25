<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/employee.model.php";
$managers = employeeUnderManager($_SESSION['user']['uid']);
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$uid = $_SESSION['user']['uid'];
$dept_id = $_SESSION['user']['department_id'];
$role_id = $_SESSION['user']['role_id'];
$currentMonth = gmdate('m', $timestamp);
$currentDay = gmdate('d', $timestamp);
$todayLeaves = [];
$approveLeave = [];
$pendingLeave = [];
$allRequest = [];
$empBirth = [];
if ($role_id == 1) {
    $allRequest = getDepartRequest($dept_id);
    $todayLeaves = getempLeaveToday($dept_id, $currentDate);
    $approveLeave = getApproveRequest($dept_id);
    $pendingLeave = getPendingRequest($dept_id);
    $empBirth = getUsersBirthday($dept_id, $currentMonth, $currentDay);
} else {
    $allRequest = getuserLeaves($uid);
    $todayLeaves = getuserLeaveToday($uid, $currentDate);
    $approveLeave = getuserApproveLeave($uid);
    $pendingLeave = getUserPendingLeave($uid);
    $empBirth = getUserBirthday($uid, $currentMonth, $currentDay);
}
require "views/employees/employee.view.php";
