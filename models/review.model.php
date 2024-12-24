<?php
//==========Get all reviews=========
function getAllReviews()
{
    global $connection;
    $statement = $connection->prepare("SELECT reviews.*,review_topics.topic_name,accounted.id,accounted.first_name as accounted_fname,accounted.first_name as accounted_lname FROM reviews INNER JOIN review_topics ON reviews.topic_id=review_topics.id INNER JOIN persons AS accounted ON accounted.id = reviews.accounted_by INNER JOIN persons AS assigned ON reviews.assigned_to=assigned.id");
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
    $statement = $connection->prepare("SELECT * FROM review_topics");
    $statement->execute();
    return $statement->fetchAll();
}
// ==========Get reviews select===========
function getReview($review_id): array
{
    global $connection;
    $statement = $connection->prepare("select * from reviews WHERE id=:review_id");
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
    $statement = $connection->prepare("UPDATE reviews SET topic_id=:reviewType_id, start_date=:start_date,end_date=:end_date WHERE id=:review_id");
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
