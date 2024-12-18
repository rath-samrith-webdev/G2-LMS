<?php
session_start();
require '../../database/database.php';
require '../../models/user.model.php';

if (isset($_POST['name']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['name']);
    $password = validate($_POST['password']);
    if (empty($name)) {
        header("Location: /loginAdmin?error=User admin is not correct");
        exit();
    } elseif (!$_POST['password'] || strlen($_POST['password']) < 6) {
        header("Location: /loginAdmin?error=Your password is not correct!");
        exit();
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['name']);
            $password = htmlspecialchars($_POST['password']);

            // Get data from database
            $user = getLogginUser($email, $password);

            // Check if user exists
            if (count($user) > 0) {
                // Check if password is correct
                $_SESSION['user'] = $user;
                $_SESSION['login'] = 1;
                header('Location: /admin');
            } else {
                header('Location: /loginAdmin?error=Your password not correct!');
            };
        };
    };
};
