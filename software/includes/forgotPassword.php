<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../PHPmailer/Exception.php';
require '../PHPmailer/PHPMailer.php';
require '../PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//get admin email
require 'dbconn.php';
$stmt = $conn->prepare("SELECT email FROM admin");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$adminEmail = $data['email'];

//generate a new password and change it in the database
$newPassword = uniqid();
$hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$stmt = $conn->prepare("UPDATE admin SET password = ?");
$stmt->bind_param("s", $hashPassword); // "s" for string, "i" for integer
$stmt->execute();


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sabed@bradford.ac.uk', 'RGAP Website - University of Bradford');
    $mail->addAddress("$adminEmail");     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Change - RGAP Website';
    $mail->Body    = '<p>Dear Admin, </p>
                         This is your new password: '. $newPassword . ' , please use it to login to the system then change your password ASAP.';
    $mail->AltBody = 'Dear Admin, this is your new password: '. $newPassword . ' , please use it to login to the system then change your password ASAP.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
