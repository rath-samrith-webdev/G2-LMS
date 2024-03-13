<?php
require "database/database.php";
require "models/user.model.php";

// ====== Capture function form profile model =========
$Roles = getRolesAll();

// var_dump($users);
require "views/manages/manage.view.php";