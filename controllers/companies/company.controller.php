<?php
require "database/database.php";
require "models/dapartment.model.php";
require "models/company.model.php";
$comany_id = $_SESSION['user']['company_id'];
$departments = getAllDepartment($comany_id);
$users = getManagers();
$company = getAllCompany($comany_id);
require "views/companies/company.view.php";
