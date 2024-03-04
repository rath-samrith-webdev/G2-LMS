<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/leavetype.model.php";
require "../../models/profile.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if (isset($_SESSION['user']['uid']) and isset($_SESSION['user']['email'])) {
    $uid = $_SESSION['user']['uid'];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ID = $_POST['cancelID'];
        $status = getLeaveStatus($ID);
        $status_message = $status['status_desc'];
        $request_id = $_POST['request_id'];
        $currentRequest = getOneleaves($request_id);
        $manager = getManager($currentRequest['uid']);
        $leaveType = $currentRequest['leaveType_desc']; //leave type
        $username = $currentRequest['first_name'] . " " . $currentRequest['last_name']; //User name
        $managerName = $manager['first_name'] . ' ' . $manager['last_name']; // Manager Name
        $managerEmail = $manager['manager_email'];  // manager email
        echo $username . '<br>';
        echo $managerName . '<br>';
        echo $managerEmail . '<br>';

        if (!empty($ID) && !empty($request_id)) {
            // Checking whether the user has permission to cancel this request or not
            $isCanceled = updatePersonalLeave($request_id, $uid);
            if ($isCanceled) { //Checking whether the data has been update 
                $email = $manager['manager_email'] ?? '';
                $content = "<div width='100%'><h1><b>Leave request</b></h1><h3>Dear " . $managerName . ",</h3><p> I am writing to inform your that " . $username . "'s request on " . $leaveType . " has been " . $status_message . ". Please ensure that your work is completed before you leave and that you have arranged for someone to cover your responsibilities while you are away.</p><br>If you have any questions or concerns, please do not hesitate to contact me.<p><b>Best regards,<br>LMS-Group2</p></b></div>";
                //Create an instance; passing true enables exceptions
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'lmsgrouptwo@gmail.com';                     //SMTP username
                    $mail->Password   = 'qdve reiz whqm ogdn';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

                    //Recipients
                    $mail->setFrom('lmsgrouptwo@gmail.com', 'LMS-Group2');
                    $mail->addAddress($managerEmail);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = $content;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                    header('location: /leaves');
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                header("location: /leaves"); //Redirect back if an error accurred
            }
        }
    }
} else {
    header("location: /leaves");
}
