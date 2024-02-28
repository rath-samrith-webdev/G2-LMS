<?php
//==========Get all reviews=========//
function getAllReviews()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM ");
    $statement->execute();
    return $statement->fetchAll();
}
