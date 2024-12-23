<?php
session_start();
$company_id = $_SESSION['user']['company_id'];
require "../../database/database.php";
require "../../models/dapartment.model.php";
require "../../models/leave_request.model.php";
require "../../models/leavetype.model.php";
// Get data for departments
$department = getAllDepartment($company_id);
$leave_type = getAlltypes();
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
$bgColor = [
    'PAIDLEAVE' => '#E65A26',
    'ANNUALLEAVE' => '#373651'
];
foreach ($department as $dept) {
    array_push($dept_name, $dept['name']);
    $emp = count(getEmployeeUnder($dept['id']));
    array_push($dept_Emp, $emp);
}

foreach ($leave_type as $type) {
    $leaves = [];
    foreach ($allmonths as $key => $month) {
        $leave = count(getRequestEachMonth($month, $type['id']));
        array_push($leaves, $leave);
    }
    array_push(
        $request,
        [
            'label' => $type['name'],
            'data' => $leaves,
            'fill' => false,
            'borderColor' => $bgColor[keyFormater($type['name'])],
            'backgroundColor' => $bgColor[keyFormater($type['name'])],
            'borderWidth' => 1,
        ]
    );
};
foreach ($allmonths as $key => $month) {
    array_push($months, $key);
}
$departments['dept_name'] = $dept_name;
$departments['dept_emp'] = $dept_Emp;
$departments['request_months'] = $months;
$departments['total_requests'] = $request;
echo json_encode($departments);


/**
 * @params 
 * {String} str
 */
function keyFormater(string $str): string
{
    return strtoupper(str_replace(' ', '', $str));
}
