<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo $_POST['uid'] . "<br>";
    // echo $_POST['leave_type'] . "<br>";
    // echo $_POST['start_date'] . "start date" . "<br>";
    // echo $_POST['end_date'] . "<br>";
    $userid = htmlspecialchars($_POST["uid"]);
    $type = $_POST['leave_type'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $isCreate = addLeave($userid, $type, $start, $end);
    if ($isCreate) {
        header("location: /calendars");
    }
}
