<?php
$host = "localhost";
$user =   "root";  // your username
$pass = "";      // your password
$db_name = "leave_manage_db";        // your database name
// Connect to server and select databse.
$dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;
try {
    $connect = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}

function getData()
{
    global $connect;
    $statement = $connect->prepare("SELECT * FROM total_requests");
    $statement->execute();
    return $statement->fetchAll();
}
