<?php

function postLeaveData(string $title, string $description ):  bool
{

    global $connection;
    $statement = $connection->prepare("insert into leave_status (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description
    ]);

    return $statement->rowCount() > 0;
    
}

function getLeaveData() : array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_status");
    $statement->execute();

    return $statement->fetchAll();
    
}

function getALlleaves(){
    global $connection;
    $statement = $connection->prepare("select * from total_requests");
    $statement->execute();

    return $statement->fetchAll();
}

function updateLeaveData(string $status, int $uid) : bool
{
    global $connection;
    $statement = $connection->prepare("update leave_requests set status_id =:status_id where uid = :uid");
    $statement->execute([
        ':uid' => $uid,
        ':status_id' => $status
    ]);

    return $statement->rowCount() > 0;
}

function deleteLeaveData(int $request_id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from leave_requests where request_id = :request_id");
    $statement->execute([':request_id' => $request_id]);
    return $statement->rowCount() > 0;
}


