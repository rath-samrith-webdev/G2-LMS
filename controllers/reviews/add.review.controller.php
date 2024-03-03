<?php
session_start();
require "../../database/database.php";
require "../../models/review.model.php";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $reviewType_id = $_POST['type'];    //review type id
    $start_date = $_POST['start_date']; //start date
    $end_date = $_POST['end_date'];     //end date
    $uid = $_SESSION['user']['uid'];    //user id
    $status_id = $_POST['type'];

    //===To get status_id===//
    // $status_id = $$_SESSION['status_types']['status_id'] 
    
    if ($uid !=='' and $reviewType_id !=='' and $start_date !== '' and $end_date !== '' and $status_id !== '') {
        $add = postReviewData($uid,$reviewType_id, $start_date, $end_date, $status_id);
        if ($add) {
            header("location: /reviews");
        }
    }
}