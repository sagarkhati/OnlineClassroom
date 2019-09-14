<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include '../database/connection.php';
if (isset($_POST['subj'])) {
    extract($_POST);

    $email = explode('; ', $to);

    $filename = $_FILES["attach"]["name"];
    $folder = $_FILES["attach"]["tmp_name"];

    if ($filename == NULL) {
        $destination = NULL;
    } else {
        $destination = "../attachment/" . $filename;
        move_uploaded_file($folder, $destination);
    }



    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    $mail = new PHPMailer();

    try {
        $mail->Host = "smtp.gmail.com";
        //$email->isSMTP();
        $mail->SMTPAuth = TRUE;
        $mail->Username = "onlineclassroom2019@gmail.com";
        $mail->Password = "OnlineClassroom@123";
        $mail->SMTPSecure = "ssl"; // or tls
        $mail->Port = 465; // or 587 if tls


        $mail->setFrom('onlineclassroom2019@gmail.com', 'Online College');
        $mail->Subject = 'Notice Received!';
        $mail->isHTML(true);
        $mail->Body = 'Dear Student,<br>You have received a notice. Please visit our site and login for more deatils... ';


        for ($i = 0; $i < count($email) - 1; $i++) {
            $query = " INSERT INTO notice VALUES (null,'$email[$i]','$from','$subj','$body','$destination',now()) ";

            if (!mysqli_query($link, $query)) {
                echo mysqli_error($link);
            }

            $mail->addAddress($email[$i]);
            $mail->send();
        }
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {' . $mail->ErrorInfo . '}")</script>';
    }




    echo '<script>alert("Notice Sent");window.location.href = "notice.php";</script>';
} else {
    die('Access Denied!');
}