<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer();

try {
    extract($_GET);
    $mail->Host = "smtp.gmail.com";
    //$email->isSMTP();
    $mail->SMTPAuth = TRUE;
    $mail->Username = "skhati06@gmail.com";
    $mail->Password = "@@11SAGAR";
    $mail->SMTPSecure = "ssl"; // or tls
    $mail->Port = 465; // or 587 if tls
    
    $mail->addAddress($send);
    $mail->setFrom('skhati06@gmail.com', 'Virtual College');
    $mail->Subject = 'Registration Alert';
    $mail->isHTML(true); 
    $mail->Body    = 'Dear '.$name.',<br>You are successfully registered to our site Virtual College...';
    $mail->send();
    header('location: index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}