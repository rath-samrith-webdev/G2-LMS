<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userid = htmlspecialchars($_POST["uid"]);
    $type = $_POST['leave_type'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $isCreate = addLeave($userid, $type, $start, $end);
    if ($isCreate) {
        header("location: /calendars");
    }
}
