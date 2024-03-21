<?php
require("../../database/database.php");
require("../../models/employee.model.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $position = $_POST['position'];
    $role = $_POST['roles'];
    $manager = $_POST['manager'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $phone_number = $_POST['phone_number'];
    $isUpdate = updateEmployee($user_id, $first_name, $last_name, $email, $phone_number, $date_of_birth, $salary, $position, $role, $manager, $department);
    if ($isUpdate) {
        header("location: /employeelist");
    } else {
        header("location: /employeelist?error=0");
    }
}
