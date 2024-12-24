<?php
session_start();
require "../../database/database.php";
require "../../models/profile.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $uid = $_POST['uid'];
    $user = oneUser($uid);
    $filename = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    // ======= upload profile image =======
    if (in_array($fileActualExt, $allow)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $filenewName = uniqid('', true) . "." . $fileActualExt;
                $directory = '../../assets/profile/profiles' . $filenewName;
                $newdirect = 'assets/profile/profiles' . $filenewName;
                $searchfile = "../../" . $user['profile_img'];

                if ($uid !== '') {
                    if (updateProfile($uid, $newdirect)) {
                        if (file_exists($searchfile)) {
                            unlink($searchfile);
                            move_uploaded_file($filetmpName, $directory);
                            $_SESSION['user']['profile_img'] = $newdirect;
                        } else {
                            move_uploaded_file($filetmpName, $directory);
                        }
                        header('location: /profiles?uid=' . $uid . '&&success=true');
                    }
                } else {
                    header('location: /profileImage?user=notfound');
                }
            } else {
                header('location: /profileImage?filesize=large');
            }
        } else {
            header('location: /profileImage?error=uploaderror');
        }
    } else {
        header('location: /profileImage?file=unsupported');
    };
};
