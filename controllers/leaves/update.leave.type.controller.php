<?php
require "../../database/database.php";
require "../../models/leavetype.model.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $typename = $_POST['typename'];
    $typedesc = $_POST['typedesc'];
    $typeDuration = $_POST['typetion'];
    if ($typename !== '') {
        $iscreated = updateLeaveType($id, $typename, $typedesc, $typeDuration);
        if ($iscreated) {
            header("location: /leavetype");
        } else {
            header("location: /leavetypeForm");
        }
    } else {
        header("location: /leavetypeForm");
    };
};
