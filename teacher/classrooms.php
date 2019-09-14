<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role']!='T') {
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
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    include '../database/connection.php';

                    $email = $_SESSION["email"];

                    $que = mysqli_query($link, " select * from classroom where email_id='$email'");
                    $row = mysqli_num_rows($que);

                    if ($row) {
                        echo '<ul>';
                        while ($result = mysqli_fetch_array($que)) {
                            echo '<a href="inside_classroom.php?code=' . $result[4] . '"><li class="well" style="list-style: none;margin-left: -40px">' . $result[1] . ' ' . $result[2] . ' - ';
                            $que2 = mysqli_query($link, " SELECT name FROM subjects WHERE code = '$result[3]' ");
                            $result2 = mysqli_fetch_array($que2);
                            echo ' ' . $result2[0] . ' (' . $result[3] . ') </li></a>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<h1 class="well">There is no classroom created.</h1>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>