<?php
function getAlltypes(){
    global $connection;
    $statement=$connection->prepare("SELECT * FROM leave_types");
    $statement->execute();
    return $statement->fetchAll();
}

function addLeaveType($desc):bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_types(leaveType_desc) VALUE (:desc)");
    $statement->execute(
        [':desc'=>$desc]
    );
    return $statement->rowCount()>0;
}
?>