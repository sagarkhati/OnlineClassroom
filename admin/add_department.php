<?PHP
session_start();
define('MyConst', TRUE);
include '../database/connection.php';
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'A') {
    header('location: ../index.php');
}
if (isset($_POST['submit'])) {
    extract($_POST);

    $query = "INSERT INTO department VALUES (null, '$deptname')";
    if (!mysqli_query($link, $query)) {
        echo mysqli_error($link);
    }

    echo '<script>alert("Department Added Successfully...")</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Department</title>

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
                        <form action="add_department.php" method="POST">
                            <center><h1><b>Add Department</b></h1></center><hr><br>
                            <div class="form-group">
                                <label for="subnm">Enter Department Name:</label>
                                <input type="text" class="form-control" name="deptname" required>
                            </div><br>
                            <button type="submit" class="btn btn-success btn-block" name="submit">ADD</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>
