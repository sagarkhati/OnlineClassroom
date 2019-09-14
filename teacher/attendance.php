<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'T') {
    header('location: ../index.php');
}
if (!isset($_GET['code'])) {
    die('Access Denied');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Attendence</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include '../header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <ul>
                        <a href="subject_content.php?code=<?PHP
                        extract($_GET);
                        echo $code;
                        ?>"><li class="well" style="list-style: none;margin-left: -40px">Content</li></a>
                        <a href="attendance.php?code=<?PHP echo $code ?>"><li class="well" style="list-style: none;margin-left: -40px">Attendance</li></a>
                      
                    </ul>
                </div>
                <div class="col-sm-5"><br>
                    <?PHP
                    include '../database/connection.php';

                    $query = "SELECT branch, semester, code FROM classroom WHERE content = '$code'";
                    $result = mysqli_query($link, $query);
                    $row = mysqli_fetch_array($result);

                    $query = "SELECT email_id, name FROM profilestudent WHERE branch = '$row[0]' and semester = '$row[1]' ";
                    $result = mysqli_query($link, $query);
                    $rows = mysqli_num_rows($result);

                    if ($rows) {
                        ?>
                        <h2>Class : <?PHP echo $row[2]; ?></h2><br>
                        <form action="submit_attendance.php" method="GET" enctype="multipart/form-data">
                            <input type="hidden" value="<?PHP echo $code; ?>" class="form-control" name="code">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
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
                                        <a href="attendance_1.php?code=<?PHP echo $code ?>&code1=<?PHP echo $row[0]; ?>">show daily attendence</a>
                                    </label>
                                </div>
                                <?PHP
                            }
                        } else {
                            echo '<h4>There is no student<h4>';
                        }
                        ?><br>
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
                <div class="col-sm-5"><br><br>
                    <?PHP
                    if (isset($_GET['submit'])) {
                        extract($_GET);
                        if ($criteria == "Above 95%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` > 95";
                        } else if ($criteria == "Between 85-95%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` BETWEEN 85 AND 95";
                        } else if ($criteria == "Between 75-85%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` BETWEEN 75 AND 85";
                        } else if ($criteria == "Between 65-75%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` BETWEEN 65 AND 75";
                        } else if ($criteria == "Between 55-65%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` BETWEEN 55 AND 65";
                        } else if ($criteria == "Below 55%") {
                            $query = "SELECT sub.`studentname`,sub.`%attendance` FROM (SELECT `studentname`, `totalpresent` / `totalclass` * 100 AS `%attendance` FROM `attendance` WHERE `subjectcode`='$code') sub WHERE sub.`%attendance` <= 55";
                        }
                        $result = mysqli_query($link, $query);
                        $rows = mysqli_num_rows($result);
                    }
                    ?>
                    <h2>Performance :</h2>
                    <form action="attendance.php" method="GET">
                        <input type="hidden" value="<?PHP echo $code; ?>" class="form-control" name="code">
                        <div class="form-group">
                            <select class="form-control" name="criteria" id="branch" onchange="dynamicdropdown()" required>
                                <option value="">SELECT CRITERIA : </option>
                                <option>Above 95%</option>
                                <option>Between 85-95%</option>
                                <option>Between 75-85%</option>
                                <option>Between 65-75%</option>
                                <option>Between 55-65%</option>
                                <option>Below 55%</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                    </form>
                    <?PHP
                    if (isset($_GET['submit'])) {
                        if ($rows) {
                            echo '<br><table border="1" cellspacing="5px"><tr><th>Name</th><th>Percentage</th></tr>';
                            while ($row = mysqli_fetch_array($result)) {
                                $result2 = mysqli_query($link, "SELECT name FROM profilestudent WHERE email_id='$row[0]' ");
                                $row2 = mysqli_fetch_array($result2);
                                echo '<tr><td>' . $row2[0] . '</td><td> <input class="knob" value="' . round($row[1]) . '" data-readonly="true" data-thickness=".4" readonly="readonly" data-width="50" data-height="50" data-angleOffset=180 data-fgColor="#87AB66" data-bgColor="#E1EAD9"></td>';
                                ?>

                                <?PHP
                            }
                            echo '</table>';
                        } else {
                            echo 'There is no student';
                        }
                    }
                    ?>
                </div>
            </div>
            <script src="../js/jquery.knob.js" type="text/javascript"></script>
            <script>
                                $('.knob').knob();
            </script>
        </div>
    </body>
</html>
