<?php
require "../../database/database.php";
require "../../models/user.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fsname = htmlspecialchars($_POST['fsname']);
    $lsname = htmlspecialchars($_POST['lsname']);
    $dateOfbirht = htmlspecialchars($_POST['datofbirth']);
    $phoneNumber = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $password= htmlspecialchars($_POST['password']);
    $salary=htmlspecialchars($_POST['salary']);
    $positions=htmlspecialchars($_POST['positions']);
    $deparments=htmlspecialchars($_POST['departments']);
    $roles=htmlspecialchars($_POST['roles']);
    $leaves=htmlspecialchars($_POST['leaves']);

    if(empty($password)) {
        header("Location: /createEmployee?error=Input the password please!");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT); // Password encryption
    $isCreate =  createUser($fsname, $lsname, $dateOfbirht, $phoneNumber, $email, $passwordHash,$salary,$positions,$deparments,$roles,$leaves);
    
    if ($isCreate) {
        header('Location: /employeelist');
    } else {
        header('Location: /create');
    };
    
};
