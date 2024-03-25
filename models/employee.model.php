<?php

// ======== create Post select title and descreiption =============
function createPost(string $title, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

// ======= Get Post select id ========
function getPost(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

// ====== Get Posts select All ========
function getPosts(): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

// ======== Update Post ========
function updatePost(string $title, string $description, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

// ======= delete Post ========
function deletePost(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

// ====== create Account ======
function createAccount(string $name, string $email, string $password): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => "user"
    ]);
    return $statement->rowCount() > 0;
};

// ====== check email =======
function accountExist(string $email): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute([':email' => $email]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    };
};

function employeeUnderManager(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM user_manager WHERE manager_id = :uid");
    $statement->execute([':uid' => $uid]);
    if ($statement->rowCount() > 0) {
        return $statement->fetchAll();
    } else {
        return [];
    }
}
function getUser(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE uid = :uid");
    $statement->execute([':uid' => $uid]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    };
};
function getUsersBirthday(int $dept_id, $month, $day): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE department_id=:dept_id AND MONTH(date_of_birth)=:month AND DAY(date_of_birth)=:day;");
    $statement->execute([":dept_id" => $dept_id, ':month' => $month, ':day' => $day]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
};
function getUserBirthday(int $uid, $month, $day): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE uid=:uid AND MONTH(date_of_birth)=:month AND DAY(date_of_birth)=:day;");
    $statement->execute([":uid" => $uid, ':month' => $month, ':day' => $day]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
};

function updateEmployee($uid, $first_name, $last_name, $email, $phone_number, $date_of_birth, $salary, $position, $role, $manager, $department)
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET first_name=:first_name,last_name=:last_name,date_of_birth=:date_of_birth,phone_number=:phone_number,email=:email,position_id=:position_id,role_id=:role_id,department_id=:department_id,salary=:salary,manager_id=:manager_id WHERE uid=:uid");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':date_of_birth' => $date_of_birth,
        ':phone_number' => $phone_number,
        ':email' => $email,
        ':position_id' => $position,
        ':role_id' => $role,
        ':department_id' => $department,
        ':salary' => $salary,
        ':manager_id' => $manager,
        ':uid' => $uid
    ]);
    return $statement->rowCount() > 0;
}
