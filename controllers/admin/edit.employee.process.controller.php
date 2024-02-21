<?php
require "../../database/database.php";
require "../../models/profile.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $uid = $_POST['uid'];
    echo $uid;
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
    var_dump($_POST);
    if (!empty($uid) and !empty($first_name) and !empty($last_name) and !empty($date_of_birth) and !empty($salary) and !empty($role) and !empty($department) and !empty($position)) {
        $isUpdate = updateUser($uid, $first_name, $last_name, $date_of_birth, $phone_number, $email, $password, $position, $role, $department, $salary);
        if ($isUpdate) {
            header("location: /manages");
        } else {
            header("location: /editEmployee?uid=" . $uid);
        }
    }
}
echo "HI";
