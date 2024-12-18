<?php
require "database/database.php";
require "models/profile.model.php";
require "models/dapartment.model.php";

// ======= Capture function form profile model ========
$allemployee = getAlldetails();
// $deparments = getDepartments();
$roles = getRoles();
$positions = getpositions();
// $managers = getManagers();
require "views/admin/employee.list.view.php";
