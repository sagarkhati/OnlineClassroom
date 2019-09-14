<?php

extract($_POST);
include_once '../database/connection.php';

$query = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='online_classroom' AND `TABLE_NAME`='$code dailyattendance'";
$result = mysqli_query($link, $query);
$arr = array();
$i=0;
while($row = mysqli_fetch_array($result)){
    $str = $row[0];
    $arr[$i] = $str;
    $i++;
}


$query2 = "SELECT * FROM `$code dailyattendance` WHERE name = '$email' ";
$result2 = mysqli_query($link, $query2);
$col = mysqli_num_fields($result2);
$row2 = mysqli_fetch_array($result2);

$arr2 = array();
for($i=2;$i<$col;$i++){
    $arr2[$arr[$i]] = (int)$row2[$i];
}

echo json_encode($arr2);
exit();