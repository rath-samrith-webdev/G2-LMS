<?php
require "database/database.php";
require "models/review.model.php";

$reviews = getAllReviews();
$review_type = getAllReviewType();
$review_status = getAllReviewStatus();
require "views/reviews/review.view.php";


