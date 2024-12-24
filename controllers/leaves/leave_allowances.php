<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/leave_request.model.php';

if (isset($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $user_id = $_SESSION['user']['id'];
    $data = getLeaveAllowanceByType($type_id, $user_id);
    echo json_encode($data);
}
