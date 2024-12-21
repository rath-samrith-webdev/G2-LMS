<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/employee.model.php";
require "../../models/leavetype.model.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = getUserById($_POST['uid']);
    $status = $_POST['leave_status'];
    $request_id = $_POST['request_id'];
    // ==Send email to employee==//
    $username = $user['first_name'];
    $request = getleave($request_id, $_POST['uid']);
    $leaveType = $request['name'];
    if (updateLeaveData($status, $request_id)) {
        $email = $user['email'];
        $content = "<div width='100%'><h1><b>Leave request</b></h1><h3>Dear " . $username . ",</h3><p> I am writing to inform you that your " . $leaveType . " has been <b>"

            . $status .
            "</b>, and you may take time off as requestd. Please ensure that your work is completed before you leave and that you have arranged for someone to cover your responsibilities while you are away.</p><br>If you have any questions or concerns, please do not hesitate to contact me.<p><b>Best regards,<br>LMS-Group2</p></b></div>";

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lmsgrouptwo@gmail.com';                     //SMTP username
            $mail->Password   = 'qdve reiz whqm ogdn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('lmsgrouptwo@gmail.com', 'LMS-Group2');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = $content;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            header("location: /calendars");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("location: /calendars?=error=act0");
        }
    }
}
