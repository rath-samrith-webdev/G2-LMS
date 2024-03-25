<?php
session_start();
require '../../database/database.php';
require '../../models/employee.model.php';

if (isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    $name = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header("Location: /?error=User Please Enter a Valid Email.");
        exit();
    }
    if (!$_POST['password'] || strlen($_POST['password']) < 8 ) {
        header("Location: /?error=Password should be minimum 8.");
        exit();
    }else{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // Get data from database
            $user = accountExist($email);

            // Check if user exists
            if (count($user) > 0) {

                // Check if password is correct
                if (password_verify($password, $user["password"])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['login'] = 1;
                    header('Location: /employees');
                } else {
                    header('Location: /?error=Your password not correct!');
                }
            }else{
                header('Location: /?error=Your password not correct!');
            }
        }else{
            header('Location: /');
        };
    };
};