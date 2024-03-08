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
