<?php
//==========Get all reviews=========
function getAllReviews()
{
    global $connection;
    $statement = $connection->prepare("  select review_id,reviews.uid,first_name,last_name,profile,reviewType_name,start_date,end_date,status_name from (((reviews inner join review_types on reviews.reviewType_id=review_types.reviewType_id)inner join review_status on reviews.status_id=review_status.status_id)inner join users on reviews.uid=users.uid);");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Get reviews_status select all===========
function getAllReviewStatus() : array
{
    global $connection;
    $statement = $connection->prepare("select * from review_status");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Get reviews_type select all===========
function getAllReviewType() : array
{
    global $connection;
    $statement = $connection->prepare("select * from review_types");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Post review in data===========
function postReviewData($uid ,$reviewType_id, $start_date, $end_date): bool
{

    global $connection;
    $statement = $connection->prepare("INSERT INTO reviews(uid, reviewType_id, start_date,end_date,status_id) VALUES (:uid, :reviewType_id, :start_date, :end_date, :status_id)");
    $statement->execute(
        [
        ':uid' => $uid,
        ':reviewType_id' => $reviewType_id,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':status_id' => 1
    ]
);

    return $statement->rowCount() > 0;
}


// ==========Edit review in data===========

function updateReview(int $uid, int $status_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE reviews SET status_id=:status_id WHERE uid=:uid");
    $statement->execute(
        [
            ':status_id' => $status_id,
            ':uid' => $uid
        ]
    );
    return $statement->rowCount() > 0;
}
