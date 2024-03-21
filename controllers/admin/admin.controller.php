<?php
require "database/database.php";
require "models/profile.model.php";
require "models/leave_request.model.php";
require "models/company.model.php";
require "models/admin.model.php";
// ======= Capture function form profile model ========
$allemployee = getAll();

// ======= Capture function form leave_request model ======
$allLeaves = getALlleaves();

// ======= Capture function form company model ======
$allCompany = getAllCompany();
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$todayLeaves = allLeavesToday($currentDate);  // Get number of leaves for today
$teamLeads = getTeamLeads();   //Get team
$currentDay = gmdate('d', $timestamp);
$currentMonth = gmdate('m', $timestamp);
$usersBirthday = getEmpBirthday($currentMonth, $currentDay);
require "views/admin/admin.view.php";
