<?php
require "database/database.php";
require "models/review.model.php";
$review_type = getAllReviewType();

require "views/reviews/review.form.view.php";

