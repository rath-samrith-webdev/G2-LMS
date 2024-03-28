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
    $dataReason = $_POST['reason'];             // reason
    $leaveType = $_POST['leaveType'];           // leaveType
    $uid = $_SESSION['user']['uid'];      // user id         

    // echo $dataReason;

    $leaveRemain = $_SESSION['user']['total_allowed_leave']; // total_allowed_leave of user
    $date1 = date_create($selectData);
    $date2 = date_create($dataValueEnd);
    $diff = date_diff($date1, $date2);
    $total = $leaveRemain - $diff->format("%a"); // calculate date all
    $manager = getUserIdManager($uid);
    $managerEmail = $manager['manager_email'];
    $firstNameManager = $manager['manager_firstname'];
    $lastNameManager = $manager['manager_lastname'];
    $firstNameUser = $manager['first_name'];
    $lastNameUser = $manager['last_name'];
    if (date('Y', strtotime($selectData)) > date('Y', strtotime($dataValueEnd))) {
        header("location: /leaves?leaveerror=notvalid");
    } elseif (date('m', strtotime($selectData)) > date('m', strtotime($dataValueEnd))) {
        header("location: /leaves?leaveerror=notvalid");
    } elseif (date('d', strtotime($selectData)) > date('d', strtotime($dataValueEnd))) {
        header("location: /leaves?leaveerror=notvalid");
    } elseif ($leaveRemain < 0) {
        header("location: /leaves?leaveerror=out");
    } else {
        //========= add request table ==========
        if ($selectData !== '' and $dataValueEnd !== '' and $uid !== '' and $leaveType !== '' and $total !== '' and $dataReason !== '') {
            if ($total) {
                $iscreated = updateCurrentLeave($uid, $total); // insert updata of total
                if ($iscreated) {
                    $add = addLeaveRequest($selectData, $dataValueEnd, $uid, $leaveType, $dataReason); // insert add request new
                    if ($add) {
                        $email = $managerEmail;
                        $content = "<div width='100%'><h1><b>Leave request</b></h1><h3>Dear " . $firstNameManager . ' ' . $lastNameManager . "</h3><p> I am writing to inform you that your " . " has been approved, and you may take time off as requestd. Please ensure that your work is completed before you leave and that you have arranged for someone to cover your responsibilities while you are away.</p><br>If you have any questions or concerns, please do not hesitate to contact me.<p><b>Best regards,<br>" . $firstNameUser . ' ' . $lastNameUser . "</p></b></div>";
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
        if ($total !== '' and $leaveRemain > 0) {
            $iscreated = updateCurrentLeave($uid, $total);
            if ($iscreated) {
                header("location: /leaves");
            }
        }
    }
}
