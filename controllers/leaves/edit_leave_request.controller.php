<?php
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/employee.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = getUser($_POST['uid']);
    $status_id = $_POST['leave_status'];
    $request_id = $_POST['request_id'];

    if (updateLeaveData($status_id, $request_id)) {
        $email = $user['email'];
        $content = "<div width='100%'><h4>Hello</h4></div>";
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
            echo 'Message has been sent';
            header('location: /leaves');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
