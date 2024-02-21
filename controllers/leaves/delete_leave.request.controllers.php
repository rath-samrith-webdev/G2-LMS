
<?php
require "../../database/database.php";
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    if ($request_id !== "" || $request_id !== 0) {
        require '../../models/leave_request.model.php';
        deleteLeaveData($request_id);
        header('Location:  /leaves');
    } else {
        header('Location:  /leaves?error=notfound');
    }
}
