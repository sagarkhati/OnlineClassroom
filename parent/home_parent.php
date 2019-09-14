<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'P') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home - Parent</title>

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
        </div>
    </body>
</html>
