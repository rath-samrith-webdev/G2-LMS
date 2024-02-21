<?php
require_once "../../database/database.php";
require_once "../../models/user.model.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    deleteUser($_GET['id']);
    header('location: /manages');
}


