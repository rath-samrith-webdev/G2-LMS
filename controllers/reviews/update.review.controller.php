<?php
require "../../database/database.php";
require "../../models/review.model.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $review_id = $_POST['review_id'];   //review id
    $reviewType_id = $_POST['type'];    //reviewType_id 
    $start_date = $_POST['start_date']; //start_date
    $end_date = $_POST['end_date'];     //end_date

    if ($review_id !== '' and $reviewType_id !== '' and $start_date !== '' and $start_date !== '') {
        $iscreated = updateReview($review_id,$reviewType_id,$start_date, $end_date);
        if ($iscreated) {
            header("location: /reviews");
        } 
    };
};
