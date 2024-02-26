<?php
require "database/database.php";
require "models/profile.model.php";

$uid = 0;
if (isset($_GET['uid']) and $_GET['uid'] !== '') {
    $uid = $_GET['uid'];
} else {
    if (isset($_SESSION["id"])) {
        $uid = $_SESSION['uid'];
    };
};
$user = oneUser($uid);

require "views/profiles/profile.view.php";
