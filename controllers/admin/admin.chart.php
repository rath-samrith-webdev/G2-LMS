<?php
require "../../database/database.php";
// require("../../models/dapartment.model.php");
require "../../models/leave_request.model.php";
// Get data for departments
$department = getAllDepartment();
$allmonths = array(
    "Jan" => 1,
    "Feb" => 2,
    "Mar" => 3,
    "Apr" => 4,
    "May" => 5,
    "June" => 6,
    "July" => 7,
    "Aug" => 8,
    "Sep" => 9,
    "Oct" => 10,
    "Nov" => 11,
    "Dec" => 12,
);
$departments = [];
$dept_name = [];
$dept_Emp = [];
$months = [];
$request = [];
foreach ($department as $dept) {
    array_push($dept_name, $dept['department_name']);
    $emp = count(getEmployeeUnder($dept['department_id']));
    array_push($dept_Emp, $emp);
}
foreach ($allmonths as $key => $month) {
    $leave = count(getRequestEachMonth($month));
    array_push($months, $key);
    array_push($request, 10);
}
$departments['dept_name'] = $dept_name;
$departments['dept_emp'] = $dept_Emp;
$departments['request_months'] = $months;
$departments['total_requests'] = $request;

echo json_encode($departments);
