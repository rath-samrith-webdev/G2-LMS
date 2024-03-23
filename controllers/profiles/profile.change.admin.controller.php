<?php 
// require "../../database/database.php";
// require "../../models/profile.model.php";

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $file = $_FILES['file'];
//     $admin_id = $_POST['admin_id'];
//     $user = oneAdmin($admin_id);
//     $filename = $_FILES['file']['name'];
//     $filetmpName = $_FILES['file']['tmp_name'];
//     $fileSize = $_FILES['file']['size'];
//     $fileError = $_FILES['file']['error'];
//     $fileType = $_FILES['file']['type'];
//     $fileExt = explode('.', $filename);
//     $fileActualExt = strtolower(end($fileExt));
//     $allow = array('jpg', 'jpeg', 'png');

//     // ======= upload profile image =======
//     if (in_array($fileActualExt, $allow)) {
//         if ($fileError === 0) {
//             if ($fileSize < 1000000) {
//                 $filenewName = uniqid('', true) . "." . $fileActualExt;
//                 $directory = '../../assets/profile/profiles' . $filenewName;
//                 $newdirect = 'assets/profile/profiles' . $filenewName;
//                 $searchfile = "../../" . $user['profile'];

//                 if ($admin_id !== '') {
//                     if (changeAdmin($admin_id, $newdirect)) {
//                         if (file_exists($searchfile)) {
//                             unlink($searchfile);
//                             move_uploaded_file($filetmpName, $directory);
//                         } else {
//                             move_uploaded_file($filetmpName, $directory);
//                         }
//                         header('location: /Add_admin?uid='.$admin_id);
//                     }
//                 } else {
//                     header('location: /Add_admin?user=notfound');
//                 }
//             } else {
//                 // header('location: /profileImage?filesize=large');
//                 echo "You file size is too large";
//             }
//         } else {
//             echo "An upload error have been accurred";
//             // header('location: /profileImage?error=uploaderror');
//         }
//     } else {
//         echo "You are not allow to upload this file";
//         // header('location: /profileImage?file=unsupported');
//     };
// };