<?php
session_start();
require("../../database/database.php");
require("../../models/review.model.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['user']['uid'])) {
        $type_name = htmlspecialchars($_POST['type_name']);
        $user_id = htmlspecialchars($_POST['uid']);
        $isAdded = addReviewType($user_id, $type_name);
        if ($isAdded) {
            header("location: /reviews?add=1");
            exit();
        } else {
            header("location: /reviews?add=0");
            exit();
        }
    } else {
        $type_name = htmlspecialchars($_POST['type_name']);
        $user_id = htmlspecialchars($_SESSION['user']['admin_id']);
        $isAdded = addReviewTypeAdmin($user_id, $type_name);
        if ($isAdded) {
            header("location: /reviews?add=1");
            exit();
        } else {
            header("location: /reviews?add=0");
            exit();
        }
    }
}
