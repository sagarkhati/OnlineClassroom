<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer();

try {
    $mail->Host = "smtp.gmail.com";
    //$email->isSMTP();
    $mail->SMTPAuth = TRUE;
    $mail->Username = "skhati06@gmail.com";
    $mail->Password = "@@11SAGAR";
    $mail->SMTPSecure = "ssl"; // or tls
    $mail->Port = 465; // or 587 if tls
    
    $mail->addAddress('sonu06sagar@gmail.com');
    $mail->setFrom('skhati06@gmail.com', 'Virtual College');
    $mail->Subject = 'Here is the subject';
    $mail->isHTML(true); 
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}