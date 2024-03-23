<?php
require "database/database.php";
require "models/admin.model.php";

// get data form databases table
$Admin = getAllAdmin();

require "views/admin/create_admi_views.php";