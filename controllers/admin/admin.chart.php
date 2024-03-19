<?php
require("../../database/database.php");
require("../../models/dapartment.model.php");
$department = getAllDepartment();
$departments = [];
$dept_name = [];
$dept_Emp = [];
foreach ($department as $dept) {
    array_push($dept_name, $dept['department_name']);
    $emp = count(getEmployeeUnder($dept['department_id']));
    array_push($dept_Emp, $emp);
}
$departments['name'] = $dept_name;
$departments['emp'] = $dept_Emp;
echo json_encode($departments);
