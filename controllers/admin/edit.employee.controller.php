<?php
require "database/database.php";
require "models/profile.model.php";

// ===== Capture id employee ======
if (isset($_GET['uid']) and $_GET['uid'] !== "") {
    $id = $_GET['uid'];
    $user = oneUser($id);
    $positions = getpositions();
    $roles = getRoles();
    $departments = getDepartments();
}
require "views/admin/edit.employee.view.php";
