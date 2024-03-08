<?php
require "database/database.php";
require "models/employee.model.php";

$managers = employeeUnderManager($_SESSION['user']['uid']);
require "views/employees/employee.view.php";