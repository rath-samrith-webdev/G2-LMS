<?php
session_start();
require "../../database/database.php";
require "../../models/review.model.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $reviewType_id = $_POST['type'];    //review type id
    $start_date = $_POST['start_date']; //start date
    $end_date = $_POST['end_date'];     //end date
    $uid = $_SESSION['user']['uid'];    //user id

    if ($uid !== '' and $reviewType_id !== '' and $start_date !== '' and $end_date !== '') {
        $add = postReviewData($uid, $reviewType_id, $start_date, $end_date);
        if ($add) {
            header("location: /reviews");
        }
    }
}
