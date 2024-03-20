<?php
require("../../database/database.php");
require("../../models/dapartment.model.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager_id = $_POST['manager'];
    $deparment_id = $_POST['department_id'];
    echo $deparment_id;
    echo $manager_id;
    $isUpdated = updateDepartment($deparment_id, $manager_id);
    if (!$isUpdated) {
        header("location: /companies?success=0");
    } else {
        header("location: /companies?success=1");
    }
}
