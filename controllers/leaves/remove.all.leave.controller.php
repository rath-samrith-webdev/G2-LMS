<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) and $_POST['confirm'] !== "" and $_POST['confirm'] === "Yes I am sure.") {
        if (removeAll()) {
            header("location: /leaves?msg=Successfully%20removed");
        } else {
            header("location: /leaves?err=Failed%20to%20");
        }
    } else {
        header("location: /leaves?error=canceled");
    }
}
