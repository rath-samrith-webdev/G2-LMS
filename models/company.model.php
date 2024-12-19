<?php

// ======== get all companies from database =========
function getAllCompany(int $company_id)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM company WHERE company.id = :company_id");
    $statement->execute([
        ':company_id' => $company_id
    ]);
    return $statement->fetch();
}
