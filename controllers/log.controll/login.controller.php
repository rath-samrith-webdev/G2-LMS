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

    if (empty($name)){
        header("Location: /?error=User name is not correct");
        exit();
    }elseif(empty($password)){
        header("Location: /?error=Password is not correct");
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
                    echo "Password is incorrect";
                } else {
                    $_SESSION['user'] = $user;
                    $_SESSION['login'] = 1;
                    header('Location: /employees');
                }
            }else{
                header('Location: /');
            }
        }else{
            header('Location: /');
        };
    };
};