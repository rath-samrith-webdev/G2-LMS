<?php
// Get one user profile from user
function oneUser(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE uid=:id LIMIT 1");
    $statement->execute([
        ':id' => $uid
    ]);
    return $statement->fetch();
};
function getAll()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll();
}
// update profile image(file path)

function updateProfile(int $uid, $newpath): bool
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
