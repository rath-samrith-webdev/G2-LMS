<?php
// header("location: /admin");
session_start();
require '../../database/database.php';
require '../../models/employee.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); //123

    // Get data from database
    $user = accountExist($email);
    // Check if user exists
    if (count($user) > 0) {
        // Check if password is correct
        if (password_verify($password, $user["password"])) {
            echo "Password is incorrect";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['login'] = 1;
            header('Location: /employees');
        }
    } else {
        header('Location: /');
    }
}
