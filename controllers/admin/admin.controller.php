<?php
require "database/database.php";
require "models/profile.model.php";
require "models/leave_request.model.php";
require "models/company.model.php";
$allemployee = getAll();
$allLeaves = getALlleaves();
$allCompany = getAllCompany();
require "views/admin/admin.view.php";
