<?php
if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET["token"]);
    $verifier = htmlspecialchars($_GET["vf"]);
} else {
    $token = "";
    $verifier = "";
}
require "views/resetPassword.view/reset.view.php";
