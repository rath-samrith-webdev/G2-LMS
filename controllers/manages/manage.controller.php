<?php
require "database/database.php";
require "models/profile.model.php";
$users = getAll();
require "views/manages/manage.view.php";
