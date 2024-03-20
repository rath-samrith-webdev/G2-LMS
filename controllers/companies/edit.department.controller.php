<?php
require("../../database/database.php");
require("../../models/dapartment.model.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager_id = htmlspecialchars($_POST['manager']);
    $department_id = htmlspecialchars($_POST['department_id']);
    $department_name = htmlspecialchars($_POST['department_name']);
    $department_desc = htmlspecialchars($_POST['department_desc']);
    if (!empty($department_name) && !empty($department_desc)) {
        $isUpdated = updateDepartment($department_id, $department_name, $department_desc, $manager_id);
        if (!$isUpdated) {
            header("location: /companies?success=0");
        } else {
            header("location: /companies?success=1");
        }
    } else {
        header("location: /companies?success=empty");
    }
}
