<?php
require_once "../../database/database.php";
require_once "../../models/user.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emID = $_POST['emID'];
    if (deleteUser($emID)) {
        header("location: /employeelist?delete=1");
    } else {
        header("location: /employeelist?delete=0");
    }
}
