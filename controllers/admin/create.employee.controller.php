<?php
require "database/database.php";
require "models/user.model.php";
$positions=getPositions();
$departments=getDepartments();
$roles=getUserrole();
$users=getUsers();
require "views/admin/create.employee.view.php";