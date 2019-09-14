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
        <title>Change Password</title>

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
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <?PHP
                    include 'database/connection.php';

                    if (isset($_POST["oldpass"])) {
                        extract($_POST);
                        $email = $_SESSION["email"];

                        $query = " SELECT password FROM login WHERE email_id='$email' and password='$oldpass' ";
                        $result = mysqli_query($link, $query);
                        $rows = mysqli_num_rows($result);

                        if ($rows) {
                            $query = " UPDATE login SET password = '$newpass' WHERE email_id='$email' ";
                            $result = mysqli_query($link, $query);
                            echo '<script>alert("Password Changed...")</script>';
                        } else {
                            echo '<script>alert("Old Password is not Correct!")</script>';
                        }
                    }
                    ?>

                    <div class="form-container">
                        <form action="change_password.php" method="POST">
                            <center><h1><b>Change Password</b></h1></center><hr><br>
                            <div class="form-group">
                                <label for="pwd">Enter Old Password:</label>
                                <input type="password" class="form-control" id="opwd" name="oldpass" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Enter New Password:</label>
                                <input type="password" class="form-control" id="pwd" name="newpass" required>
                                <span id="message1"></span>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Re-Enter New Password:</label>
                                <input type="password" class="form-control" id="rpwd" name="newpass2" required>
                                <span id="message2"></span>
                            </div><br>
                            <input type="submit" value="Change" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <script src="js/javascript.js" type="text/javascript"></script>
        </div>
    </body>
</html>
