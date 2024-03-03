<?php
// session_start();
require "../../database/database.php";
// require "models/user.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emailManager = $_POST['emailManager'];
    $message = $_POST['message'];
    echo $emailManager;
    echo "<br>";
    echo $message;

}