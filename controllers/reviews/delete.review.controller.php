<?php
require "../../database/database.php";
require "../../models/review.model.php";

if (isset($_GET['id'])) {
    $review_id= $_GET['id'];
    // echo $review_id;
    if ($review_id  !== "" || $review_id  !== 0) {
        deleteReviewData($review_id );
        header('Location:  /reviews');
    } else {
        header('Location:  /reviews?error=notfound');
    }
}