<?php
function getAlltypes(){
    global $connection;
    $statement=$connection->prepare("SELECT * FROM leave_types");
    $statement->execute();
    return $statement->fetchAll();
}