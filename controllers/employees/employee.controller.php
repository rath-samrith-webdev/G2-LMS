<?php
require "database/database.php";
require "models/leave_request.model.php";
require "models/employee.model.php";
$managers = employeeUnderManager($_SESSION['user']['id']);
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$uid = $_SESSION['user']['id'];
$dept_id = $_SESSION['user']['company_id'];
$role_id = $_SESSION['user']['role_name'];
$currentMonth = gmdate('m', $timestamp);
$currentDay = gmdate('d', $timestamp);
$todayLeaves = [];
$approveLeave = [];
$pendingLeave = [];
$allRequest = [];
$empBirth = [];
if ($role_id == 'Manager') {
    $allRequest = getDepartRequest($uid);
    $todayLeaves = getempLeaveToday($uid, $currentDate);
    $approveLeave = getApproveRequest($uid);
    $pendingLeave = getPendingRequest($uid);
    $empBirth = getUsersBirthday($uid, $currentMonth, $currentDay);
} else {
    $allRequest = getuserLeaves($uid);
    $todayLeaves = getuserLeaveToday($uid, $currentDate);
    $approveLeave = getuserApproveLeave($uid);
    $pendingLeave = getUserPendingLeave($uid);
    $empBirth = getUserBirthday($uid, $currentMonth, $currentDay);
}
require "views/employees/employee.view.php";
