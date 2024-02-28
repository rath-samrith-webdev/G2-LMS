<?php
require "database/database.php";
require "models/profile.model.php";

// ====== Capture function form profile model =========
$users = getAll();

require "views/manages/manage.view.php";