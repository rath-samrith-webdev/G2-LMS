
<?php
require "../../database/database.php";
require '../../models/leave_request.model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    if ($request_id !== "" || $request_id !== 0) {
        $deleted = deleteLeaveData($request_id);
        if ($deleted) {
            header('Location:  /leaves');
            exit();
        }
        header('Location:  /leaves?error=notfound');
    } else {
        header('Location:  /leaves?error=notfound');
    }
}
