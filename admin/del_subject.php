<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'A') {
    header('location: ../index.php');
}
?>
<?PHP
include '../database/connection.php';

function getSubjectList() {

    $link = mysqli_connect('localhost', 'root', '', 'online_classroom');
    $query = "SELECT name FROM subjects ORDER BY name";
    $result = mysqli_query($link, $query);
    $rows = mysqli_num_rows($result);

    $str = "";
    while ($row = mysqli_fetch_array($result)) {
        $str .= "<option>" . $row[0] . "</option>";
    }

    return $str;
}

if (isset($_POST['submit'])) {
    extract($_POST);

    $query = "DELETE FROM subjects WHERE name = '$subname' ";
    if (!mysqli_query($link, $query)) {
        echo mysqli_error($link);
    }

    echo '<script>alert("Subject Deleted Successfully...")</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Subject</title>

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
                        <form action="del_subject.php" method="POST">
                            <center><h1><b>Delete Subject</b></h1></center><hr><br>
                            <div class="form-group">
                                <label for="subnm">Choose Subject Name:</label>
                                <select class="form-control" name="subname" required>
                                    <option value="">CHOOSE SUBJECT :</option>
                                    <?PHP echo getSubjectList() ?>
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-danger btn-block" name="submit">DELETE</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>
