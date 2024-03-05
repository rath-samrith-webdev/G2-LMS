<?php
require "../../database/database.php";
require "../../models/reset.password.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    echo $_POST['password'];
    echo $_POST['token'];
    $request = getEmail($_POST['token']);
    $email = $request['email'];
    $user = getUser($email);
    var_dump($user);
}
