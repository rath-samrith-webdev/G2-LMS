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
