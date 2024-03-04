<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/user.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ====== get email =======
$userIdManager = getUserIdManager($_SESSION['user']['uid']);
$managerEmail = $userIdManager['manager_email'];
$mail = $userIdManager['user_email'];

// ==Send email to manager ==
$managerId = $userIdManager['manager_id'];
$managerFirstName= $userIdManager['manager_firstname'];
$managerLastName= $userIdManager['manager_lastname'];
$userfirst = $userIdManager['first_name'];
$userlast = $userIdManager['last_name'];

// Load PHPMailer classes
require 'vendor/autoload.php'; // Adjust the path as needed
$mail = $userIdManager['manager_email'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

$content = "<div width='100%'><h1><b>Leave request</b></h1><h3>Dear " . $managerFirstName .' ' . $managerLastName .",</h3><p> I am writing to inform you that your has been approved, and you may take time off as requestd. Please ensure that your work is completed before you leave and that you have arranged for someone to cover your responsibilities while you are away.</p><br>If you have any questions or concerns, please do not hesitate to contact me.<p><b> Best regards <br>" .$userfirst . ' ' . $userlast." </p></b></div>";

try {
    // Server settings
    $mail->isSMTP(); // Send using SMTP
    $mail->Host       = 'smtp.example.com'; // SMTP server
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'your_email@example.com'; // SMTP username
    $mail->Password   = 'your_password'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port       = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent using PHPMailer';

    // Send the email
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo "Email sending failed: {$mail->ErrorInfo}";
}



// if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // $selectData = $_POST['dateValue'];          // data1
    // $dataValueEnd = $_POST['dataValueEnd'];     // data2 
    // $leaveType = $_POST['leaveType'];           // leaveType
    // $userValue = $_SESSION['user']['uid'];      // user id
    // $statuID = $_POST['statuID'];               // statu id

    // $user = $_SESSION['user']['total_allowed_leave']; // total_allowed_leave of user
    // $date1=date_create($selectData);
    // $date2=date_create($dataValueEnd);
    // $diff=date_diff($date1,$date2);
    // $total = $user - $diff->format("%a"); // count data all

    // // ========= add request table ==========
    // if ($selectData !== '' and $dataValueEnd !== '' and $userValue !== '' and $leaveType !== '') {
    //    $add = addLeaveRequest($selectData, $dataValueEnd, $userValue, $leaveType); // insert add request new
    //    if($add){
    //     header("location: /leaves");
    //    }
    // }

    // // ======== updata total =========
    // if ($total !== '') {
    //     $iscreated = updateUserTotal($userValue, $total); // insert updata of total
    //     if ($iscreated) {
    //         header("location: /leaves");
    //     }
    // }

// }
