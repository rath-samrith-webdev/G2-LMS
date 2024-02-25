<?php

// get all companies from database

function getAllCompany()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM company");
    $statement->execute();
    return $statement->fetchAll();
}
