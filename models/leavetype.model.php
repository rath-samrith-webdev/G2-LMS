<?php
function getAlltypes()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_types");
    $statement->execute();
    return $statement->fetchAll();
}

// ========add leavetype===============
function addLeaveType($desc, $detail): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_types (leaveType_desc,leaveType_detail) VALUE (:desc,:detail)");
    $statement->execute(
        [
            ':desc' => $desc,
            ':detail' => $detail
        ]
    );
    return $statement->rowCount() > 0;
}

// ======== Edit leave type=============
function getleaveType($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_types WHERE leaveType_id=:id");
    $statement->execute(
        [':id' => $id]
    );
    return $statement->fetch();
};
<<<<<<< HEAD

// ===== update Leave Type ======
function updateLeaveType($id, $desc): bool
=======
function updateLeaveType($id, $desc, $detail): bool
>>>>>>> fbcff7a950e293edfbe0c9b9bf0f110a8879f986
{
    global $connection;
    $statement = $connection->prepare("UPDATE leave_types SET leaveType_desc=:desc,leaveType_detail=:details WHERE leaveType_id=:id");
    $statement->execute(
        [
            ':desc' => $desc,
            ':details' => $detail,
            ':id' => $id
        ]
    );
    return $statement->rowCount() > 0;
}

// ======= delete leave Type ======
function deleteLeaveType (int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM leave_types WHERE leaveType_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
