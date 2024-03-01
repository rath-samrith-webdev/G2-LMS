<?php
//==========Get all reviews=========
function getAllReviews()
{
    global $connection;
    $statement = $connection->prepare("  select review_id,reviews.uid,first_name,last_name,profile,reviewType_name,start_date,end_date,status_name from (((reviews inner join review_types on reviews.reviewType_id=review_types.reviewType_id)inner join review_status on reviews.status_id=review_status.status_id)inner join users on reviews.uid=users.uid);");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Get reviews select all===========
function getAllReview() : array
{
    global $connection;
    $statement = $connection->prepare("select * from review_status");
    $statement->execute();
    return $statement->fetchAll();
}


