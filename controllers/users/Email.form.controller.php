<?php
require "database/database.php";
require "models/user.model.php";
$manager = getAllManager();
// var_dump ($manager);

require "views/users/form.Email.view.php";