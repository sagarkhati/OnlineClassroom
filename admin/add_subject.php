<?PHP
session_start();
define('MyConst', TRUE);
include '../database/connection.php';
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'A') {
    header('location: ../index.php');
}
if (isset($_POST['submit'])) {
    extract($_POST);

    $query = "INSERT INTO subjects VALUES ('$subcode', '$subname', '$branch', '$sem')";
    if (!mysqli_query($link, $query)) {
        echo mysqli_error($link);
    }

    echo '<script>alert("Subject Added Successfully...")</script>';
}
?>
<?PHP
function getDepartmentList(){
    $link = mysqli_connect('localhost','root','','online_classroom');
    $query = " SELECT name FROM department ";
    $result = mysqli_query($link, $query);
    
    $dept = "";
    while($row = mysqli_fetch_array($result)){
        $dept .= "<option>" . $row[0] . "</option>";
    }
    return $dept;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Subject</title>

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
                        <form action="add_subject.php" method="POST">
                            <center><h1><b>Add Subject</b></h1></center><hr><br>
                            <div class="form-group">
                                <label for="subcode">Enter Subject Code:</label>
                                <input type="text" class="form-control" name="subcode" required>
                            </div>
                            <div class="form-group">
                                <label for="subnm">Enter Subject Name:</label>
                                <input type="text" class="form-control" name="subname" required>
                                <span id="message1"></span>
                            </div>
                            <div class="form-group">
                                <label for="sellist">Branch :</label>
                                <select class="form-control" name="branch" id="branch" required>
                                    <option value="">SELECT BRANCH : </option>
                                    <?PHP echo getDepartmentList() ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sellist">Semester :</label>
                                <select class="form-control" name="sem" id="sem" required>
                                        
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-success btn-block" name="submit">ADD</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <script src="../js/javascript.js" type="text/javascript"></script>
        </div>
    </body>
</html>
