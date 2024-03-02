<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/user.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $selectData = $_POST['dateValue'];          // data1
    $dataValueEnd = $_POST['dataValueEnd'];     // data2 
    $leaveType = $_POST['leaveType'];           // leaveType
    $userValue = $_SESSION['user']['uid'];      // user id
    $statuID = $_POST['statuID'];               // statu id

    $user = $_SESSION['user']['total_allowed_leave']; // total_allowed_leave of user
    $date1=date_create($selectData);
    $date2=date_create($dataValueEnd);
    $diff=date_diff($date1,$date2);
    $total = $user - $diff->format("%a"); // count data all

    // ========= add request table ==========
    if ($selectData !== '' and $dataValueEnd !== '' and $userValue !== '' and $leaveType !== '') {
       $add = addLeaveRequest($selectData, $dataValueEnd, $userValue, $leaveType); // insert add request new
       if($add){
        header("location: /leaves");
       }
    };

    // ======== updata total =========
    if ($total !== '') {
        $iscreated = updateUserTotal($userValue, $total); // insert updata of total
        if ($iscreated) {
            header("location: /leaves");
        }
    }

}