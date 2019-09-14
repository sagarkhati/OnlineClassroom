<?PHP
session_start();
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'A') {
    header('location: ../index.php');
}
if(!isset($_POST['submit'])){
    die('Access Denied');
}
?>

<?php

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

    for ($i = 0; $i < count($email) - 1; $i++) {
        $query = " INSERT INTO notice VALUES (null,'$email[$i]','$from','$subj','$body','$destination',now()) ";
        if(!mysqli_query($link, $query)){
            echo mysqli_error($link);
        }
    }
    echo '<script>alert("Notice Sent");window.location.href = "notice.php";</script>';
}

