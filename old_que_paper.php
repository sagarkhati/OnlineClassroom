<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Old Que Papers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include 'header2.php'; ?>
                </div>
            </div>
            <div style="padding: 10px;">
                <img src="" alt=""/>
                <?php
                include 'database/connection.php';

                $query = " SELECT * FROM quepapers ORDER BY year DESC, semester DESC";
                $result = mysqli_query($link, $query);
                $rows = mysqli_num_rows($result);

                if ($rows) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="row well"> 
                            <div class="col-xs-2">
                                <?PHP echo $row[3]; ?>
                            </div>
                            <div class="col-xs-2">
                                <?PHP echo $row[1]; ?>
                            </div>
                            <div class="col-xs-2">
                                <?PHP echo $row[2]; ?>
                            </div>
                            <div class="col-xs-6">
                                <?PHP
                                if ($row[4] == "image") {
                                    echo '<a href="'.$row[5].'" download><img src="' . $row[5] . '" alt="pic" width="200px" height="246px" class="well"></a><br>';
                                } else {
                                    echo '<a href="' . $row[5] . '" ><img src="images/pdficon.png" alt="pic" width="100px" height="123px" class="well" /></a><br>';
                                }
                                ?>
                            </div>
                        </div>
                        <?PHP
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
