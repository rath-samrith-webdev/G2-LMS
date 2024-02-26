<?php
require "database/database.php";
require "models/profile.model.php";
require "models/leave_request.model.php";

// ======= Capture function form profile model ========
$allemployee = getAll();

// ======= Capture function form leave_request model ======
$allLeaves = getALlleaves();

require "views/admin/admin.view.php";
