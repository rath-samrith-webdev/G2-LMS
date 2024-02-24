<?php
session_start();
require '../../database/database.php';
require '../../models/admin.model.php';

if (isset($_POST['name']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['name']);
    $password = validate($_POST['password']);
    if (empty($name)){
        header("Location: /loginAdmin?error=User aAdmin is not correct");
        exit();
    }elseif(empty($password)){
        header("Location: /loginAdmin?error=Password is not correct");
        exit();
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = htmlspecialchars($_POST['name']);
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
                    header('Location: /admin');
                }
            }
            else{
                header('Location: /loginAdmin');

            }
        }
    }
}