<?php
function getAllDepartment(): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM departments LEFT JOIN users ON users.uid=departments.manager_id");
    $stm->execute();
    if (!$stm) {
        return [];
    } else {
        return $stm->fetchAll();
    }
}

function getEmployeeUnder($uid)
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM users WHERE department_id=:uid");
    $stm->execute([':uid' => $uid]);
    if (!$stm) {
        return [];
    } else {
        return $stm->fetchAll();
    }
}

function getLeaves($department_id)
{
    global $connection;
    $stm = $connection->prepare("SELECT *,COUNT(leave_requests.uid) AS total FROM ((departments INNER JOIN users ON departments.department_id=users.department_id)INNER JOIN leave_requests ON users.uid=leave_requests.uid) WHERE departments.department_id=:uid;");
    $stm->execute([':uid' => $department_id]);
    if (!$stm) {
        return [];
    } else {
        return $stm->fetchAll();
    }
}


function getManager(): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM users WHERE role_id=1");
    $stm->execute();
    if (!$stm) {
        return [];
    } else {
        return $stm->fetchAll();
    }
}

function getMax(array $leaves): array
{
    $maxIndex = 0;
    $maxNum = 0;
    for ($i = 0; $i < count($leaves); $i++) {
        if ($leaves[$i]['total'] > $maxNum) {
            $maxNum = 0;
            $maxIndex = $i;
        }
    }
    return $leaves[$maxIndex];
}

function getMin(array $leaves): array
{
    $maxIndex = 0;
    $maxNum = 1;
    for ($i = 0; $i < count($leaves); $i++) {
        if ($leaves[$i]['total'] < $maxNum) {
            $maxNum = 0;
            $maxIndex = $i;
        }
    }
    return $leaves[$maxIndex];
}
