<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'T') {
    header('location: ../index.php');
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
        <title>Notice Board</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

        <script>
            function dynamicdropdown() {
                var listvalue = document.getElementById('branch').value;

                sem.innerHTML = "";
                if (listvalue === "MCA") {
                    var optionArray = ["|Select Semester : ", "I|I", "II|II", "II|III", "IV|IV", "V|V", "VI|VI"];
                } else {
                    var optionArray = ["|Select Semester : ", "I|I", "II|II", "III|III", "IV|IV", "V|V", "VI|VI", "VII|VII", "viii|VII"];
                }

                for (option in optionArray) {
                    var pair = optionArray[option].split("|");
                    var newOption = document.createElement("option");
                    newOption.value = pair[0];
                    newOption.innerHTML = pair[1];
                    sem.options.add(newOption);
                }
            }
        </script>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include '../header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h2>By Branch</h2><hr><br>
                    <form action="notice.php" method="POST">
                        <div class="form-group">
                            <label for="sellist">Branch :</label>
                            <select class="form-control" name="branch" id="branch" onchange="dynamicdropdown()" required>
                                <option value="">SELECT BRANCH : </option>
                                <?PHP echo getDepartmentList() ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sellist">Semester :</label>
                            <select class="form-control" name="sem" id="sem" onchange="dynamicdropdown2()" required>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="send_notice.php" method="POST" enctype="multipart/form-data">
                        <h2>List of Student(s)</h2><hr><br>
                        <?PHP
                        include '../database/connection.php';

                        if (isset($_POST["branch"])) {
                            extract($_POST);

                            $query = " SELECT email_id, name FROM profilestudent WHERE branch='$branch' and semester='$sem' ";
                            $result = mysqli_query($link, $query);
                            $rows = mysqli_num_rows($result);

                            if ($rows) {
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkall"> SELECT ALL
                                    </label>
                                </div>
                                <hr>
                                <?PHP
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>    
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="checkitem" name="email[]" value="<?PHP echo $row[0]; ?>"> <?PHP echo $row[1]; ?>
                                        </label>
                                    </div>
                                    <?PHP
                                }
                            } else {
                                echo '<h4>There is no student<h4>';
                            }
                        } else if (isset($_POST['hostel'])) {
                            extract($_POST);

                            $query = " SELECT email_id, name FROM profilestudent WHERE hostel='$hostel' ";
                            $result = mysqli_query($link, $query);
                            $rows = mysqli_num_rows($result);

                            if ($rows) {
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkall"> SELECT ALL
                                    </label>
                                </div>
                                <hr>
                                <?PHP
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>    
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="checkitem" name="email[]" value="<?PHP echo $row[0]; ?>"> <?PHP echo $row[1]; ?>
                                        </label>
                                    </div>
                                    <?PHP
                                }
                            } else {
                                echo '<h4>There is no student<h4>';
                            }
                        }
                        ?>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>        
                    </form>
                    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
                    <script>
                                $("#checkall").change(function () {
                                    $(".checkitem").prop("checked", $(this).prop("checked"));
                                });
                                $(".checkitem").change(function () {
                                    if ($(this).prop("checked") === false) {
                                        $("#checkall").prop("checked", false);
                                    }
                                    if ($(".checkitem:checked").length === $(".checkitem").length) {
                                        $("#checkall").prop("checked", true);
                                    }
                                });
                    </script>
                </div>
                <div>
                </div>
                </body>
                </html>