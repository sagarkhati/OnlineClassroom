<?PHP

include '../database/connection.php';
extract($_GET);

$query = "UPDATE attendance SET totalclass = totalclass + 1 WHERE subjectcode='$code' ";
mysqli_query($link, $query);

$query = "ALTER TABLE `$code dailyattendance` ADD `$date` INT(1) NOT NULL DEFAULT '0' ";
mysqli_query($link, $query);




$x = $_GET['email'];
$to = '';
foreach ($x as $email) {
    $to = $to . $email . '; ';
}

$email = explode('; ', $to);

for ($i = 0; $i < count($email) - 1; $i++) {
    $query = " UPDATE attendance SET totalpresent = totalpresent + 1 WHERE subjectcode='$code' and studentname = '$email[$i]' ";
    mysqli_query($link, $query);
    $query = " UPDATE `$code dailyattendance` SET `$date`='1' WHERE name = '$email[$i]' ";
    mysqli_query($link, $query);
}
echo '<script>alert("Attendance Submitted");window.location.href = "attendance.php?code=' . $code . '";</script>';

