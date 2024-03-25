<?php
//==========Get all reviews=========
function getAllReviews()
{
    global $connection;
    $statement = $connection->prepare("select review_id,reviews.uid,first_name,last_name,profile,reviewType_name,start_date,end_date,status_name from (((reviews inner join review_types on reviews.reviewType_id=review_types.reviewType_id)inner join review_status on reviews.status_id=review_status.status_id)inner join users on reviews.uid=users.uid)");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Get reviews_status select all===========
function getAllReviewStatus(): array
{
    global $connection;
    $statement = $connection->prepare("select * from review_status");
    $statement->execute();
    return $statement->fetchAll();
}

// ==========Get reviews_type select all===========
function getAllReviewType(): array
{
    global $connection;
    $statement = $connection->prepare("select reviewType_id,reviewType_name,review_types.uid,first_name,last_name,added_time,profile from review_types left join users on review_types.uid=users.uid");
    // $statement = $connection->prepare("select * from review_types");
    $statement->execute();
    return $statement->fetchAll();
}
// ==========Get reviews select===========
function getReview($review_id): array
{
    global $connection;
    $statement = $connection->prepare("select * from reviews WHERE review_id=:review_id");
    $statement->execute([':review_id' => $review_id]);
    return $statement->fetch();
}

// ==========Post review in data===========
function postReviewData($uid, $reviewType_id, $start_date, $end_date): bool
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


// ==========Edit review type in data===========

function updateReviewStatus(int $uid, int $status_id): bool
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


// ======== Update review of data========
function updateReview($review_id, $reviewType_id, $start_date, $end_date): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE reviews SET reviewType_id=:reviewType_id, start_date=:start_date,end_date=:end_date WHERE review_id=:review_id");
    $statement->execute(
        [
            ':reviewType_id' => $reviewType_id,
            ':start_date' => $start_date,
            ':end_date' => $end_date,
            ':review_id' => $review_id
        ]
    );
    return $statement->rowCount() > 0;
}


// ======== Delete review of data========
function deleteReviewData(int $review_id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from reviews where review_id = :review_id");
    $statement->execute([':review_id' => $review_id]);
    return $statement->rowCount() > 0;
}

function addReviewType($uid, $type_name): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO review_types (reviewType_name,uid) VALUES (:type_name,:uid)");
    $statement->execute([':type_name' => $type_name, ':uid' => $uid]);
    return $statement->rowCount() > 0;
}

function addReviewTypeAdmin($uid, $type_name): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO review_types (reviewType_name,admin_id) VALUES (:type_name,:uid)");
    $statement->execute([':type_name' => $type_name, ':uid' => $uid]);
    return $statement->rowCount() > 0;
}
