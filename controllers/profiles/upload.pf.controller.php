<?php
require "../../database/database.php";
require "../../models/profile.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $uid = $_POST['uid'];
    echo $uid;
    $filename = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allow)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $filenewName = uniqid('', true) . "." . $fileActualExt;
                $directory = '../../assets/profile/profiles' . $filenewName;
                $newdirect = 'assets/profile/profiles' . $filenewName;
                if (updateProfile($uid, $newdirect)) {
                    move_uploaded_file($filetmpName, $directory);
                    header("location : /manages");
                }
            } else {
                echo "You file size is too large";
            }
        } else {
            echo "An upload error have been accurred";
        }
    } else {
        echo "You are not allow to upload this file";
    }
}
