<?php
require "database/database.php";
require "models/user.model.php";
require "models/dapartment.model.php";
// ======= Capture function form user model ========
$positions = getPositions();
$departments = getDepartments();
$roles = getUserrole();
$users = getUsers();
$managers = getManagers();

require "views/admin/create.employee.view.php";
