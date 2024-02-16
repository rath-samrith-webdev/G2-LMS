<?php
require "database/database.php";
require "models/profile.model.php";
if (isset($_GET['uid']) and $_GET['uid'] !== "") {
    $id = $_GET['uid'];
    $user = oneUser($id);
}
require "views/admin/edit.employee.view.php";
