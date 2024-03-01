<?php
require "database/database.php";
require "models/review.model.php";

$reviews = getAllReviews();
$review_status = getAllReview();
require "views/reviews/review.view.php";


