<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/user.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userid = htmlspecialchars($_POST["uid"]);
    $type = $_POST['leave_type'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $diff = date_diff($date1, $date2);
    $leaveRemain = $_SESSION['user']['total_allowed_leave'];
    $total = $leaveRemain - $diff->format("%a");
    if (date('Y', strtotime($start)) > date('Y', strtotime($end))) {
        header("location: /calendars?leaveerror=notvalid");
    } elseif (date('m', strtotime($start)) > date('m', strtotime($end))) {
        header("location: /calendars?leaveerror=notvalid");
    } elseif (date('d', strtotime($start)) > date('d', strtotime($end))) {
        header("location: /calendars?leaveerror=notvalid");
    } elseif ($leaveRemain < 0) {
        header("location: /calendars?leaveerror=out");
    } else {
        $isCreate = addLeave($userid, $type, $start, $end);
        if ($isCreate) {
            if ($total !== '' and $leaveRemain > 0) {
                $iscreated = updateCurrentLeave($userid, $total);
                if ($iscreated) {
                    header("location: /calendars");
                }
            }
        }
    }
}
// Hello world