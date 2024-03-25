<?php
session_start();
require "../../database/database.php";
require "../../models/reset.password.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';
date_default_timezone_set('Asia/Bankok');
$today = date('Y-m-d');
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
      $mail->Body    = '<div
            style="
              width: 100%;
              height: 700px;
              border-radius: 10px;
              align-items:center;
              box-shadow: 2px 2px -2px 3px #ccc;
            "
          >' . '
            <div
              style="
                width: 60%;
                border-radius: 10px 10px 0 0;
                background-color: dodgerblue;
                padding: 10px;
              "
            >' . '
              <div
                style="
                  text-align: center;
                  color: white;
                  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS",
                    sans-serif;
                  font-size: large;
                "
              >' . '
                <h4 style="text-align:center;color:white">LMS-G2</h4>
              </div>
            </div>
            <div
              style="width: 60%; border-radius: 0 0 10px 10px; padding: 10px"  
            >' . '
              <div
                style="
                  width: 100%;
                  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial,
                    sans-serif;
                "
              >
                <h4>Dear LMS User,</h4>
              </div>
              <div
                style="
                  width: 100%;"
              >
                <p
                  style="
                    width: 100%;
                    font-family: "Franklin Gothic Medium","Arial Narrow", Arial,
                      sans-serif;
                  "
                >
                  We have received your request for resetting you password on
                  <b>' . $today . '</b>.
                </p>
                <div
                  style="width: 100%; display: flex; justify-content: center"
                >
                  <a
                    href=" ' . $url . ' "
                    style="
                      text-decoration: none;
                      border: 1px solid dodgerblue;
                      border-radius: 10px;
                      padding: 10px;
                    "
                    >Click this to update your password</a
                  >
                </div>
              </div>
              <div style="width: 100%">
                <div>
                  <p
                    style="
                      width: 100%;
                      font-family: "Franklin Gothic Medium", "Arial Narrow", Arial,
                        sans-serif;
                    "
                  >
                    Thanks for using our platform,
                  </p>
                  <p
                    style="
                      width: 100%;
                      font-family: "Franklin Gothic Medium", "Arial Narrow", Arial,
                        sans-serif;
                     "
                  >
                    <b>LMS-G2</b>.
                  </p>
                </div>
              </div>
            </div>
          </div>';
      // to solve a problem 
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );


      $mail->send();
      $_SESSION['email'] = 1;
      header("location: /forgetPass");
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
