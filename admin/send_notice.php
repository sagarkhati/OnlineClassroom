<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'A') {
    header('location: ../index.php');
}
if (!isset($_POST['submit'])) {
    die('Access Denied!');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container" style="width: 50%">
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
                    <textarea class="form-control" rows="5" name="body" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Attachment :</label>
                    <input type="file" class="form-control-file" name="attach">
                </div>
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
