<?php
require "database/database.php";
require "models/leavetype.model.php";
$leaveTypes=getAlltypes();
require 'views/leaves/leavetype.view.php';
?>