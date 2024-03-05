<?php
if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET["token"]);
} else {
    $token = "";
}
require "views/resetPassword.view/reset.view.php";
