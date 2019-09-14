<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'P') {
    header('location: ../index.php');
}
if(!isset($_GET['code'])){
    die('Access Denied');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subject Content</title>

        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="conatiner-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include '../header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    include '../database/connection.php';

                    if (isset($_GET["code"])) {
                        extract($_GET);
                        $email = $_SESSION["email"];

                        $query = " SELECT * FROM `$code` ORDER BY timestamp DESC";
                        $result = mysqli_query($link, $query);
                        $row = mysqli_num_rows($result);

                        if ($row) {
                            while ($row1 = mysqli_fetch_array($result)) {
                                if ($row1[1] == "image") {
                                    echo '<img src="' . $row1[2] . '" alt="pic" width="200px" height="246px" class="well"><br>';
                                } else {
                                    echo '<a href="' . $row1[2] . '" ><img src="../images/pdficon.png" alt="pic" width="100px" height="123px" class="well" /></a><br>';
                                }
                            }
                        } else {
                            echo '<h1 class="well">There is no content</h1>';
                        }
                    }
                    ?>
                </div>
            </div> 
        </div>
    </body>
</html>
