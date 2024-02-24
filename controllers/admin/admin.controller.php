<?php
require "database/database.php";
require "models/profile.model.php";
require "models/leave_request.model.php";
$allemployee = getAll();
$allLeaves = getALlleaves();
require "views/admin/admin.view.php";
