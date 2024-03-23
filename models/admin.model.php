<?php
function createAccount(string $name, string $password): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO admins (admin_username, admin_password) VALUES (:admin_username, :admin_password,)");
    $statement->execute([
        ':admin_username' => $name,
        ':admin_password' => $password,
    ]);
    return $statement->rowCount() > 0;
};

// ======= check password ==========
function accountExist(string $password): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM admins WHERE admin_password = :admin_password");
    $statement->execute([':admin_password' => $password]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
function getPersonalLeaves(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM total_requests WHERE uid=:uid");
    $statement->execute([":uid" => $uid]);
    return $statement->fetchAll();
}
function getTeamLeads()
{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM user_details WHERE position_name=:position_name");
    $statment->execute(
        [':position_name' => "Team lead"]
    );
    return $statment->fetchAll();
}

function getEmpBirthday($month, $day): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE MONTH(date_of_birth)=:month AND DAY(date_of_birth)=:day;");
    $statement->execute([':month' => $month, ':day' => $day]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
};

// Insert databases to admin 
function CreateAdmin($first_name, $last_name, $admin_email, $phone_number, $admin_password): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO admins (first_name, last_name, admin_email, phone_number, admin_username, admin_password) VALUES (:first_name, :last_name, :admin_email, :phone_number, :admin_username, :admin_password)");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' =>$last_name,
        ':admin_email' =>$admin_email,
        ':phone_number' =>$phone_number,
        ':admin_username' => 'admin',
        ':admin_password' =>$admin_password,
    ]);
    return $statement->rowCount() > 0;
};

// get admin all
function getAllAdmin(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM admins");
    $statement->execute();

    return $statement->fetchAll();
}
