<?php

// $hostname = "localhost";
// $database = "leave_manage_db";
// $username = "root";
// $password = "rath";

// $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
// $connection = new PDO($dsn, $username, $password);
// SQLite database configuration
$databasePath = "database/database.sqlite";
try {
    // Create a new SQLite database connection
    $dsn = "sqlite:" . $databasePath;
    $connection = new PDO($dsn);

    // Set error mode to exceptions for better error handling
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->execute();
    $data = $statement->fetchAll();
    echo "Connection to SQLite database successful.";
    print_r($data);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
