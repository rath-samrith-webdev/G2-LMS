<?php

function createPost(string $title, string $description) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getPosts() : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description, int $id) : bool
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

function deletePost(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//login
function createAccount(string $name, string $email, string $password): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
    $statement->execute([
        ':name'=>$name,
        ':email'=>$email,
        ':password'=>$password,
        ':role'=>"user"
    ]);
    return $statement->rowCount() > 0;
};

//check email
function accountExist(string $email): array {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $statement -> execute([':email'=>$email]);
    // return $statement->fetch();
    if($statement->rowCount() > 0){
        return $statement -> fetch();

    }else{
        return [];
    }
}
