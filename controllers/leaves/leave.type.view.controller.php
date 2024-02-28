<?php
require "database/database.php";
require "models/leavetype.model.php";

// ====== Capture function leaveType model =========
$leaveTypes=getAlltypes();

require 'views/leaves/leavetype.view.php';
