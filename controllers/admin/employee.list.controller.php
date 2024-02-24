<?php 
require "database/database.php";
require "models/profile.model.php";
$allemployee=getAll();
require "views/admin/employee.list.view.php";
