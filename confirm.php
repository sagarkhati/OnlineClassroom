<?php
if(!isset($_GET['email']) || !isset($_GET['token'])){
    header('location: index.php');
    exit();
}else{
    extract($_GET);
    
    include_once 'database/connection.php';
    
    $query = "SELECT email_id FROM login WHERE email_id = '$email' AND token = '$token' AND isEmailConfirmed = 0 ";
    $result = mysqli_query($link, $query);
    
    if(mysqli_num_rows($result) > 0){
        mysqli_query($link, "UPDATE login SET isEmailConfirmed=1, token='' WHERE email_id = '$email' ");
        echo '<script>alert("Your email has been verified! You can login now...")</script>';
    }
    
    header('location: index.php');
    exit();
}

