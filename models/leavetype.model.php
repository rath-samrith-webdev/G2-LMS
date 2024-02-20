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
function getleaveType($id):array
{
    global $connection;
    $statement=$connection->prepare("SELECT * FROM leave_types WHERE leaveType_id=:id");
    $statement->execute(
        [':id'=>$id]
    );
    return $statement->fetch();
};
function updateLeaveType($id,$desc):bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE leave_types SET leaveType_desc=:desc WHERE leaveType_id=:id");
    $statement->execute(
        [':desc'=>$desc,
        ':id'=>$id
        ]
    );
    return $statement->rowCount()>0;
}
?>
