<?php
// ======== Get one user profile from user ==========
function oneUser(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE uid=:id LIMIT 1");
    $statement->execute([
        ':id' => $uid
    ]);
    return $statement->fetch();
};

// ======== Get one admin profile from admin ==========
function oneAdmin($admin_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM admins WHERE admin_id=:admin_id LIMIT 1");
    $statement->execute([
        ':admin_id' => $admin_id
    ]);
    return $statement->fetch();
};

// ======== update profile image(file) ========
function updateAdmin($admin_id, $admin_profile): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE admins SET admin_profile=:admin_profile WHERE admin_id=:admin_id");
    $statement->execute(
        [
            // ':path' => $newpath,
            ':admin_id' => $admin_id,
            ':admin_profile' => $admin_profile
        ]
    );
    return $statement->rowCount() > 0;
}


// ======== get select all of data ==========
function getAll(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll();
}

// ======== update profile image(file path) ========
function updateProfile(int $uid, string $newpath): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET profile=:path WHERE uid=:uid");
    $statement->execute(
        [
            ':path' => $newpath,
            ':uid' => $uid
        ]
    );
    return $statement->rowCount() > 0;
}

// ========= get select of positions ==========
function getpositions(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM postions");
    $statement->execute();
    return $statement->fetchAll();
}

// ========= get select of user roles =========
function getRoles(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM userroles");
    $statement->execute();
    return $statement->fetchAll();
}

// ======== get select of departments ========
function getDepartments(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM departments");
    $statement->execute();
    return $statement->fetchAll();
}

// ======== Updata user =======
function updateUser($uid, $first_name, $last_name, $date_of_birth, $phone_number, $email, $password, $position, $role, $department, $salary): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET first_name=:first_name,last_name=:last_name,date_of_birth=:date_of_birth,phone_number=:phone_number,email=:email,password=:passwords,position_id=:position_id,role_id=:role_id,department_id=:department_id,salary=:salary WHERE uid=:uid");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':date_of_birth' => $date_of_birth,
        ':phone_number' => $phone_number,
        ':email' => $email,
        ':passwords' => $password,
        ':position_id' => $position,
        ':role_id' => $role,
        ':department_id' => $department,
        ':salary' => $salary,
        ':uid' => $uid
    ]);
    return $statement->rowCount() > 0;
}
//======== Get manager===========================================
function getManager($uid)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM user_manager WHERE uid=:uid");
    $statement->execute([":uid" => $uid]);
    return $statement->fetch();
}
//=======get user details=======
function getAlldetails(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM user_details");
    $statement->execute();
    return $statement->fetchAll();
}
