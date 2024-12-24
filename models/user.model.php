<?php

// ======== create Users ========

// ===== Get Logged in user ====

function getLogginUser(string $email, string $password)
{
    global $connection;
    $statement = $connection->prepare("SELECT users.id,users.email,persons.civil_title,persons.first_name,persons.last_name,persons.gender,persons.profile_img,persons.date_of_birth,userRole.name AS role_name,user_has_Roles.company_id  FROM users 
    INNER JOIN persons ON users.id = persons.user_id INNER JOIN user_has_Roles ON user_has_Roles.user_id =users.id INNER JOIN userRole ON userRole.id==user_has_Roles.role_id
    WHERE users.email = :email AND users.password = :password LIMIT 1");
    $statement->execute([
        ':email' => $email,
        ':password' => $password
    ]);
    return  $statement->fetch();
}


function createUser(string $fsname, string $lsname, string $dateOfbirth, string $phoneNumer, string $email, string $password, string $salary, string $positions, string $roles, string $departments, string $leaves): bool
{
    global $connection;
    $userStatement = $connection->prepare("insert into users (email, password, role_id)
    values (:email, :password, :role_id)");
    $statement = $connection->prepare("insert into persons (user_id,first_name, last_name,person_detail_id, date_of_birth)
    values (:user_id,:first_name, :last_name,:person_detail_id,:date_of_birth)");
    $personDetails = $connection->prepare("insert into person_details (position_id, department_id)
    values (:department_id,:position_id)");

    $userStatement->execute([
        ':email' => $email,
        ':password' => $password,
        ':role_id' => $roles,
    ]);
    $userId = $connection->lastInsertId();

    $userRoleStatement = $connection->prepare("INSERT INTO user_has_roles (user_id, role_id) VALUES (:user_id, :role_id)");
    $userRoleStatement->execute([
        ':user_id' => $userId,
        ':role_id' => $roles
    ]);

    $personDetails->execute([
        ':department_id' => $departments,
        ':position_id' => $positions,
    ]);
    $personDetailsId = $connection->lastInsertId();

    $statement->execute([
        ':user_id' => $userId,
        ':person_detail_id' => $personDetailsId,
        ':first_name' => $fsname,
        ':last_name' => $lsname,
        ':date_of_birth' => $dateOfbirth,
    ]);
    return $statement->rowCount() > 0;
}

// ======== get select of departments ==========
function getDepartments(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM departments");
    $statement->execute();
    return $statement->fetchAll();
}

// ======= delete of users ======== 
function deleteUser(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from users where uid = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// ======== get select of postions =========
function getPositions(): array
{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM positions");
    $statment->execute();
    return $statment->fetchAll();
}

// ======== get select of user roles ========
function getUserrole(): array
{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM userRole");
    $statment->execute();
    return $statment->fetchAll();
}

// ======== get select of users ========
function getUsers(): array
{
    global $connection;
    $statment = $connection->prepare("SELECT * FROM users");
    $statment->execute();
    return $statment->fetchAll();
}


function getRolesAll(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM userRole");
    $statement->execute();
    return $statement->fetchAll();
}

// ===== get All user manager =====
function getUserIdManager(int $id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM user_manager WHERE uid =:uid");
    $statement->execute([':uid' => $id]);
    return $statement->fetch();
}
function updateCurrentLeave(int $id, int $total): bool
{
    global $connection;
    $statment = $connection->prepare('UPDATE users SET total_allowed_leave=:total WHERE uid=:id');
    if ($statment) {
        $statment->execute([':total' => $total, ':id' => $id]);
        return true;
    } else {
        return false;
    }
}
function getAuser(int $uid)
{
    global $connection;
    $statement = $connection->prepare("SELECT * from users WHERE uid=:uid");
    $statement->execute([':uid' => $uid]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetch();
    }
}
