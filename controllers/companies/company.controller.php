<?php
require "database/database.php";
require "models/dapartment.model.php";
require "models/company.model.php";
$departments = getAllDepartment();
$users = getManagers();
$company = getAllCompany();
require "views/companies/company.view.php";
