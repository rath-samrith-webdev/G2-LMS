<?php
session_start();
require "../../database/database.php";
require "../../models/leave_request.model.php";
require "../../models/user.model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';


// Get value from input

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $selectData = $_POST['dateValue'];          // data1
    $dataValueEnd = $_POST['dataValueEnd'];     // data2 
    $leaveType = $_POST['leaveType'];           // leaveType
    $uid = $_SESSION['user']['uid'];      // user id         

    $leaveRemain = $_SESSION['user']['total_allowed_leave']; // total_allowed_leave of user
    $date1 = date_create($selectData);
    $date2 = date_create($dataValueEnd);
    $diff = date_diff($date1, $date2);
    $total = $leaveRemain - $diff->format("%a"); // calculate date all
    $manager = getUserIdManager($uid);
    $managerEmail = $manager['manager_email'];
    //========= add request table ==========
    if ($selectData !== '' and $dataValueEnd !== '' and $uid !== '' and $leaveType !== '') {
        if ($total > 0) {
            $iscreated = updateCurrentLeave($uid, $total); // insert updata of total
            if ($iscreated) {
                $add = addLeaveRequest($selectData, $dataValueEnd, $uid, $leaveType); // insert add request new
                if ($add) {
                    $email = $managerEmail;
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
                        $mail->addAddress($email);     //Add a recipient
                        // $mail->addAddress('ellen@example.com');               //Name is optional
                        // $mail->addReplyTo('info@example.com', 'Information');
                        // $mail->addCC('rathsamreth0200@gmail.com');
                        // $mail->addBCC('bcc@example.com');

                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('../../assets/document/Company List.xlsx', 'Company Name');    //Optional name
                        // $mail->addAttachment('../../assets/images/testing_image.png', 'Image Test');    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Here is the subject';
                        $mail->Body    = $content;
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        header("location: /leaves");
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        header("location: /leaves?email=0");
                    }
                } else {
                    header("location: /leaves");
                }
            } else {
                header("location: /leaves");
            }
        } else {
            header("location: /leaves?error=outofLeave");
        }
    }
}
