<?php
require "../../database/database.php";
require "../../models/profile.model.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $uid = $_POST['uid'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $department = $_POST['departments'];
    $position = $_POST['positions'];

    // ====== edit employee =========
    if (!empty($uid) AND !empty($first_name) AND !empty($last_name) AND !empty($date_of_birth) AND !empty($salary) and !empty($role) AND !empty($department) AND !empty($position)) {
        $isUpdate = updateUser($uid, $first_name, $last_name, $date_of_birth, $phone_number, $email, $password, $position, $role, $department, $salary);
        if ($isUpdate) {
            header("location: /employeelist");
        } else {
            header("location: /editEmployee?uid=" . $uid);
        };
    };
};
