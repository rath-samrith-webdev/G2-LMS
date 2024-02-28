<?php
require "../../database/database.php";

if (isset($_GET['deleteType'])) {
    $leaveType_id = $_GET['deleteType'];
    if ($leaveType_id !== "" || $leaveType_id !== 0) {
        require '../../models/leavetype.model.php';
        deleteLeaveType($leaveType_id);
        header('Location:  /leavetype');
    } else {
        header('Location:  /leavetype');
    }
}
