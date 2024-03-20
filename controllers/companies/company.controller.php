<?php
require "database/database.php";
require "models/dapartment.model.php";
require "models/company.model.php";
$departments = getAllDepartment();
$users = getManager();
$company = getAllCompany();
require "views/companies/company.view.php";
