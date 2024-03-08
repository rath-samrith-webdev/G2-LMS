<?php
require "database/database.php";
require "models/dapartment.model.php";
require "models/user.model.php";
$departments = getAllDepartment();
$users = getUsers();
require "views/companies/company.view.php";
