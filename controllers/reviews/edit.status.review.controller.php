<?php
session_start();
require "../../database/database.php";
require "../../models/review.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $status_id = $_POST['status_id'];   //status id
    $uid = $_SESSION['user']['uid'];    //user id
    $review_id = $_POST['review_id'];   //review id

    
    if ($review_id !== '' and $uid !== '' and $status_id !== '' ) {
        $addData = updateReviewStatus($uid, $status_id);
        if ($addData) {
            header('location: /reviews');
        }else{
            header('location: /reviews');
        };
    }
}
