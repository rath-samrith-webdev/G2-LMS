<?php
require "database/database.php";
require "models/leavetype.model.php";

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $leaveType=getleaveType($id);

}
require "views/leaves/edit_leave_type.views.php";