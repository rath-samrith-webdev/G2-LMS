<?php
function getAllDepartment(int $company_id): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM departments INNER JOIN persons ON departments.manager_id = persons.id WHERE company_id=:company_id");
    $stm->execute([
        ':company_id' => $company_id
    ]);
    return $stm->fetchAll();
}

function getEmployeeUnder($uid)
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM users INNER JOIN persons ON persons.user_id = users.id INNER JOIN person_details ON persons.person_detail_id=person_details.id WHERE person_details.department_id=:uid");
    $stm->execute([':uid' => $uid]);
    return $stm->fetchAll();
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
function getManagers(): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM users INNER JOIN persons ON persons.user_id=users.id INNER JOIN person_details ON person_details.id = persons.person_detail_id WHERE role_id=1");
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
        if ($leaves[$i]['total'] > $maxNum) {
            $maxNum = $leaves[$i]['total'];
            $most = $leaves[$i];
        }
    };
    return $most;
}

function getMin(array $leaves, int $maxNum): array
{
    $minNum = $maxNum;
    $least = [];
    for ($i = 0; $i < count($leaves); $i++) {
        if ($leaves[$i]['total'] < $minNum) {
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

function  updateDepartment($dept_id, $dept_name, $dept_desc, $manager_id): bool
{
    global $connection;
    $stm = $connection->prepare('UPDATE departments SET department_name=:dept_name,department_desc=:dept_desc,manager_id=:manager_id WHERE department_id=:dept_id');
    $stm->execute([':manager_id' => $manager_id, ':dept_name' => $dept_name, ':dept_desc' => $dept_desc, ':dept_id' => $dept_id]);
    return $stm->rowCount() > 0;
}
