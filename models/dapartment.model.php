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
    $stm = $connection->prepare("SELECT * FROM department_requests WHERE department_id=:uid;");
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
    $maxNum = 0;
    $most = [];
    for ($i = 0; $i < count($leaves); $i++) {
        if ($leaves[$i]['total'] >= $maxNum) {
            $maxNum = $leaves[$i]['total'];
            $most = $leaves[$i];
        }
    };
    return $most;
}

function getMin(array $leaves): array
{
    $minNum = 1;
    $least = [];
    for ($i = 0; $i < count($leaves); $i++) {
        if ($leaves[$i]['total'] <= $minNum) {
            $minNum = $leaves[$i]['total'];
            $least = $leaves[$i];
        }
    };
    return $least;
}

function insertDepartment($dept_name, $dept_desc, $manager_id): bool
{
    global $connection;
    $stm = $connection->prepare("INSERT INTO departments (department_name,department_desc,manager_id) VALUE (:dept_name,:dept_desc,:manager_id);");
    $stm->execute([':dept_name' => $dept_name, ':dept_desc' => $dept_desc, ':manager_id' => $manager_id]);
    return $stm->rowCount() > 0;
}
