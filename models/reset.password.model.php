<?php
function insertTokenAndEmail(string $email, string $token, string $code): bool
{
    global $connection;
    $stm = $connection->prepare("INSERT INTO password_reset_request(email,token,verifier) VALUES(:email,:token,:verifier)");
    $stm->execute([':email' => $email, ':token' => $token, ':verifier' => $code]);
    return $stm->rowCount() > 0;
}
function getEmail(string $token): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM  password_reset_request WHERE token=:token LIMIT 1");
    $stm->execute([':token' => $token]);
    return $stm->fetch();
}
function getUser(string $email): array
{
    global $connection;
    $stm = $connection->prepare("SELECT * FROM  users WHERE email=:email LIMIT 1");
    $stm->execute([
        ':email' => $email
    ]);
    return $stm->fetch();
}
function updateNewpass(string $email, string $newpass): bool
{
    global $connection;
    $stm = $connection->prepare('UPDATE users SET password=:password WHERE email=:email');
    $stm->execute([':password' => $newpass, ':email' => $email]);
    return ($stm->rowCount()) ? true : false;
}
