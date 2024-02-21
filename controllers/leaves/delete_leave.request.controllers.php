
<?php
require "../../database/database.php";
$request_id = $_GET['request_id'];

if (isset($request_id))
{
    require '../../models/leave_request.model.php';
    deleteLeaveData($request_id);
    header('Location:  /leaves');
}