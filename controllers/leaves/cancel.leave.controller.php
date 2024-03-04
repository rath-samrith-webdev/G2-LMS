<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
if (isset($_SESSION['user']['uid']) and isset($_SESSION['user']['email'])) {
    $uid = $_SESSION['user']['uid'];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ID = $_POST['cancelID'];
        $request_id = $_POST['request_id'];
        if (!empty($ID) && !empty($request_id)) {
            // Checking whether the user has permission to cancel this request or not
            $isCanceled = updatePersonalLeave($request_id, $uid);
            if ($isCanceled) { //Checking whether the data has been update 
                header("location: /leaves"); //Redirect back if completed
            } else {
                header("location: /leaves"); //Redirect back if an error accurred
            }
        }
    };
} else {
    header("location: /leaves");
}
