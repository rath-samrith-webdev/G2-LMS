<?php
session_start();
require '../../database/database.php';
require '../../models/user.model.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?error=Invalid request method');
    exit();
}

if (!isset($_POST['name']) || !isset($_POST['password'])) {
    header('Location: /?error=Missing credentials');
    exit();
}

// Sanitize inputs
$email = filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Validate email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?error=Invalid email format');
    exit();
}

// Validate password length
if (strlen($password) < 6) {
    header('Location: /?error=Password must be at least 6 characters');
    exit();
}

// Attempt to get user from database
$user = getLogginUser($email, $password);

if (empty($user)) {
    header('Location: /?error=Invalid credentials');
    exit();
}

// Check if user is admin, if not redirect to employees page
if (isset($user['role_name']) and $user['role_name'] !== 'Administrator') {
    $_SESSION['user'] = $user;
    $_SESSION['login'] = 1;
    header('Location: /employees');
    exit();
}

// Set session and redirect
$_SESSION['user'] = $user;
$_SESSION['login'] = 1;
header('Location: /admin');
exit();
