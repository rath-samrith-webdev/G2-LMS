<?php
require "../../database/database.php";
require "../../models/leavetype.model.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $typename = $_POST['typename'];
    $typedetail = $_POST['typedesc'];
    // $typedesc=$_POST['typedesc'];
    if ($typename !== '' and $typedetail !== '') {
        $iscreated = addLeaveType($typename, $typedetail);
        if ($iscreated) {
            header("location: /leavetype");
        } else {
            header("location: /leavetypeForm");
        }
    } else {
        header("location: /leavetypeForm");
    }
}
