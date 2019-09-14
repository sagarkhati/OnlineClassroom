<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role']!='T') {
    header('location: ../index.php');
}
if(!isset($_POST['submit'])){
    die('Access Denied!');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="form-container">
                        <form action="sending_notice.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txt">To :</label>
                                <input type="text" class="form-control" name="to" value="<?PHP
                                extract($_POST);
                                $x = $_POST['email'];
                                foreach ($x as $email) {
                                    echo $email . '; ';
                                }
                                ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txt">From :</label>
                                <input type="text" class="form-control" name="from" value="<?PHP
                                $y = $_SESSION['email'];
                                echo $y;
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="txt">Subject :</label>
                                <input type="text" class="form-control" name="subj">
                            </div>
                            <div class="form-group">
                                <label for="comment">Notice :</label>
                                <textarea class="form-control" rows="5" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Attachment :</label>
                                <input type="file" class="form-control-file" name="attach">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    </body>
</html>
