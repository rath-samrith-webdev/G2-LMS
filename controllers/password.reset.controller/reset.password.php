<?php
session_start();
require "../../database/database.php";
require "../../models/reset.password.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" and $_POST['email'] !== "") {
    $email = $_POST['email'];
    $token = uniqid(true);
    $verifier = rand(0, 9999);
    // if you are in actual web server, instead of http://" . $_SERVER['HTTP_HOST'] write your link 
    $isInserted = insertTokenAndEmail($email, $token, $verifier);
    $url = "http://" . $_SERVER['HTTP_HOST'] . "/updatepass?token=" . $token . "&vf=" . $verifier;
    if ($isInserted) {
        $_SESSION['email'] = 1;
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;     // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username   = 'lmsgrouptwo@gmail.com';                     //SMTP username
            $mail->Password   = 'qdve reiz whqm ogdn';                          // SMTP password
            // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = 587;   // for tls                                 // TCP port to connect to
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('lmsgrouptwo@gmail.com', 'LMS-G2'); // from who? 
            $mail->addAddress($email, 'LMS User');     // Add a recipient

            $mail->addReplyTo('no-replay@example.com', 'No Replay');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Content
            // this give you the exact link of you site in the right page 


            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Your password reset link';
            $mail->Body    = "<h1> you requested password reset </h1>
                             Click <a href='$url'>this link</a> to do so";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // to solve a problem 
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );


            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        exit();
    } else {
        $_SESSION['email'] = 0;
        header("location: /forgetPass");
    }
} else {
    $_SESSION['email'] = 0;
    header("location: /");
}
