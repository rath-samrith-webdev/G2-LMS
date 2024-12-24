<?php

// $hostname = "localhost";
// $database = "leave_manage_db";
// $username = "root";
// $password = "rath";

// $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
// $connection = new PDO($dsn, $username, $password)
// Define the absolute path to the database file

$databasePath = __DIR__ . "/database.sqlite";

try {
    // Create a new SQLite database connection
    $dsn = "sqlite:" . $databasePath;
    $connection = new PDO($dsn);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    global $connection;
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
