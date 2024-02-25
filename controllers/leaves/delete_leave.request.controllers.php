
<?php
require "../../database/database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    if ($request_id !== "" || $request_id !== 0) {
        require '../../models/leave_request.model.php';
        deleteLeaveData($request_id);
        header('Location:  /leaves');
    } else {
        header('Location:  /leaves?error=notfound');
    }
}
