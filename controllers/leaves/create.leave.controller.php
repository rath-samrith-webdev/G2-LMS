<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $selectData = $_POST['dateValue'];
    $dataValueEnd = $_POST['dataValueEnd'];
    $leaveType = $_POST['leaveType'];
    $userValue = $_SESSION['user']['uid'];
    $statuID = $_POST['statuID'];

    if ($selectData !== '' and $dataValueEnd !== '' and $leaveType !== '' and $userValue !== '' and $statuID !== '') {
       $add = addLeaveRequest($selectData, $dataValueEnd, $leaveType, $userValue, $statuID);
       if($add){
        header("location: /leaves");
       };
    };

}
