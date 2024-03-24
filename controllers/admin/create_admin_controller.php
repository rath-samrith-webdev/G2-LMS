<?php
require "../../database/database.php";
require "../../models/admin.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['fsnameAdmin'];
    $last_name = $_POST['lsnameAdmin'];
    $admin_email = $_POST['emailAdmin'];
    $password = $_POST['passwordAdmin'];
    $phone_number = $_POST['phoneAdmin'];
    
    // $admin_password = password_hash($password, PASSWORD_BCRYPT); // count Password encryption
    $iscreated = CreateAdmin($first_name, $last_name, $admin_email, $phone_number, $password);
    if ($passwords) {
        header('Location: /createAdmin');
    }else{
        header('Location: /createAdmin');
    }
}