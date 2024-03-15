<?php
require("../../database/database.php");
require("../../models/dapartment.model.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manage_id = $_POST['manager'];
    $deparment_name = $_POST['departmentName'];
    $department_desc = $_POST['departmentDESC'];
    echo "<br>" . $manage_id;
    echo "<br>" . $deparment_name;
    echo "<br>" . $department_desc;
    if (!empty($manage_id) && !empty($deparment_name) && !empty($department_desc)) {
        $created = insertDepartment($deparment_name, $department_desc, $manage_id);
        if ($created) {
            header("location: /companies?error=0");
        } else {
            header("location: /companies?error=createFailed");
        }
    } else {
        header("location: /companies?error=missing");
    }
} else {
    header("location: /companies?error=1");
}
