<?php
require "database/database.php";
require "models/profile.model.php";
if (isset($_GET['uid']) and $_GET['uid'] !== '') {
    $uid = $_GET['uid'];
    $user = oneUser($uid);
}
require "views/profiles/profile.view.php";
