<?php

include 'database/connection.php';
if (isset($_POST['b'])) {
    extract($_POST);
    $query = " SELECT code, name FROM subjects WHERE branch='$b' and semester='$s' ";
    $result = mysqli_query($link, $query);
    $options = "<option value=''>SELECT SUBJECT : </option>";
    while ($row = mysqli_fetch_array($result)) {
        $options .= "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
    }
    echo $options;
} else {
    die('Access Denied!');
}