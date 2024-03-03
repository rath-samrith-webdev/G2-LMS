<?php
$timestamp = time();
$currentDate = gmdate('Y-m-d', $timestamp);
$todayLeaves = allLeavesToday($currentDate);
require "views/employees/employee.view.php";
