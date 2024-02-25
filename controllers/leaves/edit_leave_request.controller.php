<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $status_id = $_POST['leave_status'];
    $request_id = $_POST['request_id'];
    echo 'HI';
    if (updateLeaveData($status_id, $request_id)) {
       header('location: /leaves'); 
    };

}
