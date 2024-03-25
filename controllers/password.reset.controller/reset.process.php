<?php
require "../../database/database.php";
require "../../models/reset.password.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $password = $_POST['password'];
    $token= $_POST['token'];
    $code = $_POST['vf'];
    $request = getEmail($_POST['token'], $code);
    $email = $request['email'];
    $user = getUser($email);

    $newpass = password_hash($password, PASSWORD_BCRYPT); // count Password encryption

    $isupdated = updateNewpass($email, $newpass);
    if (!$isupdated) {
        header("Location: /forgetPass");
    } else {
        $isremoved = removeToken($email, $token, $code);
        if (!$isremoved) {
            die('Error');
        } else {
            header("Location: /");
        }
    }
}
