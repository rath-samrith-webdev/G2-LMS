<?php
require "database/database.php";
require "models/dapartment.model.php";
$departments = getAllDepartment();
$users = getManager();
var_dump($departments);
require "views/companies/company.view.php";
