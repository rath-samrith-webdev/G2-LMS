<?php
require "database/database.php";
require "models/review.model.php";

$review_type = getAllReviewType();
$reviews = getAllReviews();

//get all edit review//
$uid= $_SESSION['user'];    //get user id
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id= $_POST['id'];
}
$review = getReview($id);
require "views/reviews/edit.review.php";
