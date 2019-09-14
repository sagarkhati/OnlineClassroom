<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email'])) {
    header('location: index.php');
} else {
    if ($_SESSION['role'] == 'P') {
        die('Access Denied!');
    }
}
?>

<?PHP
include 'database/connection.php';
if (isset($_POST["sem"])) {
    extract($_POST);

    $filename = $_FILES["content"]["name"];
    $folder = $_FILES["content"]["tmp_name"];

    $destination = "quepapers/" . $filename;
    move_uploaded_file($folder, $destination);

    $query = " INSERT INTO quepapers VALUES (null, '$sem', '$subcode', '$year', '$type', '$destination', now()) ";
    $result = mysqli_query($link, $query);

    echo '<script>alert("Que Paper Uploaded")</script>';
}
?>

<?PHP

function getDepartmentList() {
    $link = mysqli_connect('localhost', 'root', '', 'online_classroom');
    $query = " SELECT name FROM department ";
    $result = mysqli_query($link, $query);

    $dept = "";
    while ($row = mysqli_fetch_array($result)) {
        $dept .= "<option>" . $row[0] . "</option>";
    }
    return $dept;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload Qustion Paper</title>
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
                    <div class="form-container">
                        <form action="upload_que_paper.php" method="POST" enctype="multipart/form-data">
                            <h1 style="margin: 0 auto"><b>Upload Question Paper</b></h1><hr><br>
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
                            </div>
                            <div class="form-group">
                                <label for="sellist">Subject :</label>
                                <select class="form-control" name="subcode" id="subcode" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sellist">Date Year :</label>
                                <select class="form-control" name="year" required>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sellist">Format :</label>
                                <select class="form-control" name="type" required>
                                    <option>image</option>
                                    <option>other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Question Paper :</label>
                                <input type="file" class="form-control-file"  name="content" required>
                            </div><br>
                            <button type="submit" class="btn btn-success btn-block">Upload</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="js/javascript.js" type="text/javascript"></script>
        </div>
    </body>
</html>
