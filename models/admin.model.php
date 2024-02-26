<?php
function createAccount(string $name, string $password): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO admins (admin_username, admin_password) VALUES (:admin_username, :admin_password,)");
    $statement->execute([
        ':admin_username'=>$name,
        ':admin_password'=>$password,
    ]);
    return $statement->rowCount() > 0;
};

// ======= check password ==========
function accountExist(string $password): array {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM admins WHERE admin_password = :admin_password");
    $statement -> execute([':admin_password'=>$password]);
    if($statement->rowCount() > 0){
        return $statement -> fetch();

    }else{
        return [];
    }
}