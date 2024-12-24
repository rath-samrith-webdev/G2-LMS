<?php
function getPersonalLeaves(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT profile_img,leave_requests.*,first_name,last_name,name FROM leave_requests INNER JOIN persons ON persons.id = leave_requests.employee_id INNER JOIN leave_types ON leave_types.id=leave_requests.leave_type_id WHERE employee_id=:uid");
    $statement->execute([":uid" => $uid]);
    return $statement->fetchAll();
}
function getTeamLeads()
{
    global $connection;
    $statment = $connection->prepare("SELECT *,departments.name as department_name FROM person_details INNER JOIN persons ON persons.person_detail_id = person_details.id INNER JOIN departments ON departments.id = person_details.department_id WHERE position_id=:position_id");
    $statment->execute(
        [':position_id' => "1"]
    );
    return $statment->fetchAll();
}

function getEmpBirthday($month, $day): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users 
        INNER JOIN persons ON persons.user_id = users.id 
        WHERE strftime('%m', persons.date_of_birth) = :month 
        AND strftime('%d', persons.date_of_birth) = :day");
    $statement->execute([
        ':month' => sprintf("%02d", $month),
        ':day' => sprintf("%02d", $day)
    ]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
};
// get admin all
function getAllAdmin(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT DISTINCT persons.*,users.email FROM users 
        INNER JOIN user_has_Roles ON user_has_Roles.role_id = users.role_id 
        INNER JOIN persons ON persons.user_id = users.id 
        WHERE users.role_id = 1");
    $statement->execute();

    return $statement->fetchAll();
}
