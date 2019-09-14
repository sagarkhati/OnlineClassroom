<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'T') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home - Teacher</title>
        <meta charset="UTF-8">
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
            <div style="background-image: url('../images/nav-image_MyC-SPANClassroom.jpg'); background-repeat: no-repeat; background-size: 100%; width: 100%; height: 528px">
                
            </div>
        </div>
    </body>
</html>