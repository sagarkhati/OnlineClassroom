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
        <title>Notice</title>
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
            <div style="background-image: url('../images/project/notice.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover; width: 100%; height: 1000px">
                <div class="row">
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
                </div><br>
                <?PHP
                include '../database/connection.php';
                $email = $_SESSION["email"];
                $query = " SELECT * FROM notice WHERE toemail='$email' ORDER BY timestamp DESC ";
                $result = mysqli_query($link, $query);
                $rows = mysqli_num_rows($result);
                if ($rows) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="row well">
                            <div class="col-xs-2">
                                <?PHP echo $row[2]; ?>
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
        </div>
    </body>
</html>
