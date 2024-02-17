<?php
// header("location: /admin");
session_start();
require '../../database/database.php';
require '../../models/admin.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);//123
    // echo $password;

    // Get data from database
    $user = accountExist($password);
    // Check if user exists
    if (count($user)>0) {
        // Check if password is correct
        if (password_verify($password, $user["password"])) {
            echo "Password is incorrect";
        } else {
            $_SESSION['user'] = $user;
            header('Location: /admin');
        }
    } 
    else {
        header('Location: /loginAdmin');
    }
}