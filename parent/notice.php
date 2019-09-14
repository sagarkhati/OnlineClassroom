<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role']!='P') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notice</title>
        
        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <div class="row well">
                <div class="col-xs-2">
                    <h4><i><b>From</b></i></h4>
                </div>
                <div class="col-xs-2">
                    <h4><i><b>Subject</b></i></h4>
                </div>
                <div class="col-xs-4">
                    <h4><i><b>Body</b></i></h4>
                </div>
                <div class="col-xs-2">
                    <h4><i><b>Attachment</b></i></h4>
                </div>
                <div class="col-xs-2">
                    <h4><i><b>Time</b></i></h4>
                </div>
            </div>
            <?PHP
            include '../database/connection.php';
            $email = $_SESSION["email"];

            $query = " SELECT childmail FROM profileparent WHERE email_id = '$email' ";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);

            $query = " SELECT * FROM notice WHERE toemail='$row[0]' ORDER BY timestamp DESC ";
            $result = mysqli_query($link, $query);
            $rows = mysqli_num_rows($result);
            if ($rows) {
                while ($row = mysqli_fetch_array($result)) {
                    $query2 = "SELECT name FROM profileteacher WHERE email_id='$row[2]'";
                    $result2 = mysqli_query($link, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    ?>
                    <div class="row well">
                        <div class="col-xs-2">
                            <?PHP echo $row2[0]; ?>
                        </div>
                        <div class="col-xs-2">
                            <?PHP echo $row[3]; ?>
                        </div>
                        <div class="col-xs-4">
                            <?PHP echo $row[4]; ?>
                        </div>
                        <div class="col-xs-2">
                            <?PHP
                            if ($row[5] == NULL) {
                                echo 'No Attachment!';
                            } else {
                                echo '<a href="' . $row[5] . '">Click Me</a>';
                            }
                            ?>
                        </div>
                        <div class="col-xs-2">
                            <?PHP echo $row[6]; ?>
                        </div>
                    </div>
                    <?PHP
                }
            } else {
                echo '<h4 class="well">No Notice for YOU</h4>';
            }
            ?>
        </div>
    </body>
</html>
