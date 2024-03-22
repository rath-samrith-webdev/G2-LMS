<?php
require_once "../../database/database.php";
require_once "../../models/user.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emID = $_POST['emID'];
    $user = getAuser($emID);
    $user_profile = $user['profile'];
    $searchDir = "../../" . $user_profile;

    if (deleteUser($emID)) {
        if (file_exists($searchDir)) {
            unlink($searchDir);
        } else {
            echo "File is not found";
        }
        header("location: /employeelist?delete=1");
    } else {
        header("location: /employeelist?delete=0");
    }
}
