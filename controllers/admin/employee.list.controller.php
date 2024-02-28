<?php 
require "database/database.php";
require "models/profile.model.php";

// ======= Capture function form profile model ========
$allemployee=getAll();

require "views/admin/employee.list.view.php";
