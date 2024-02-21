<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm']) and $_POST['confirm'] !== "" and $_POST['confirm'] === "Yes I am sure.") {
        removeAll();
        header("location: /leaves");
    } else {
        header("location: /leaves?error=canceled");
    }
}
