<?php
require "database/database.php";
require "models/dapartment.model.php";
$departments = getAllDepartment();
$users = getManager();
require "views/companies/company.view.php";
