<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'S') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Classroom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include '../header.php'; ?>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <?php
                        include '../database/connection.php';

                        $email = $_SESSION["email"];

                        $result = mysqli_query($link, " select semester from profilestudent where email_id='$email' ");
                        $row = mysqli_num_rows($result);
                        $row1 = mysqli_fetch_array($result);



                        $query = "SELECT * FROM classroom WHERE semester='$row1[0]'";
                        $result2 = mysqli_query($link, $query);
                        $row2 = mysqli_num_rows($result2);



                        if ($row2) {

                            echo '<ul>';
                            while ($row3 = mysqli_fetch_array($result2)) {
                                echo '<a href="inside_classroom.php?code=' . $row3[4] . '"><li class="well" style="list-style: none;margin-left: -40px">' . $row3[1] . ' ' . $row3[2] . ' - ';
                                $que = mysqli_query($link, " SELECT name FROM subjects WHERE code = '$row3[3]' ");
                                $result3 = mysqli_fetch_array($que);
                                echo ' ' . $result3[0] . ' (' . $row3[3] . ') </li></a>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<h1 class="well">There is no classroom created for you</h1>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
