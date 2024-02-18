<?php
require "database/database.php";
require "models/user.model.php";
$employee=getUsers();
require "views/manages/manage.view.php";