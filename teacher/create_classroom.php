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
    <?php
    if (isset($_POST["sem"])) {
        include '../database/connection.php';
        extract($_POST);

        $email = $_SESSION["email"];

        $result = mysqli_query($link, "SELECT name FROM profileteacher WHERE email_id='$email'");
        $row = mysqli_fetch_array($result);
        $name = $subcode . $row[0];

        mysqli_query($link, " INSERT INTO classroom VALUES ('$email','$branch', '$sem', '$subcode', '$name', now()) ");

        $query = "CREATE TABLE IF NOT EXISTS `online_classroom`.`$name` ( 
                    `sn` INT(5) NOT NULL AUTO_INCREMENT ,
                    `format` VARCHAR(5) NOT NULL ,
                    `path` VARCHAR(100) NOT NULL ,
                    `description` VARCHAR(100) NULL ,
                    `timestamp` DATETIME NOT NULL,
                    PRIMARY KEY(sn)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        mysqli_query($link, $query);

        $query = "CREATE TABLE IF NOT EXISTS `$name dailyattendance` ( 
                    `sn` INT(5) NOT NULL AUTO_INCREMENT ,
                    `name` VARCHAR(50) NOT NULL ,
                    PRIMARY KEY(sn)
                ) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        mysqli_query($link, $query);

        $result = mysqli_query($link, "SELECT email_id FROM profilestudent WHERE branch='$branch' and semester ='$sem' ");
        $rows = mysqli_num_rows($result);
        if ($rows) {
            while ($row = mysqli_fetch_array($result)) {
                $query = "INSERT INTO attendance VALUES (null, '$row[0]', '$name', '0', '0')";
                if (!mysqli_query($link, $query)) {
                    echo mysqli_error($link);
                }
                $query = "INSERT INTO `$name dailyattendance` VALUES (null, '$row[0]')";
                if (!mysqli_query($link, $query)) {
                    echo mysqli_error($link);
                }
            }
        } else {
            
        }

        echo '<script>alert("classroom is created")</script>';
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Create Classroom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/stylesheet.css" rel="stylesheet" type="text/css"/>
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
                        <center><h1><b>Create Classroom</b></h1></center><hr><br>
                        <form action="create_classroom.php" method="POST">
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
                            <div class="form-group">
                                <label for="sellist">Subject :</label>
                                <select class="form-control" name="subcode" id="subcode" required>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                        <br>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <script lang="javascript" type="text/javascript">
                function dynamicdropdown() {
                    var listvalue = document.getElementById('branch').value;

                    sem.innerHTML = "";
                    if (listvalue == "MCA") {
                        var optionArray = ["|Select Semester : ", "I|I", "II|II", "III|III", "IV|IV", "V|V"];
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
                function dynamicdropdown2() {
                    var listvalue = document.getElementById('branch').value;
                    var listvalue2 = document.getElementById('sem').value;

                    subcode.innerHTML = "";
                    if (listvalue == "MCA" && listvalue2 == "I") {
                        var optionArray = ["|Select Subject : ",
                            "MCA-101|Programming & Problem Solving Using C",
                            "MCA-102|Computer Organization & Architecture",
                            "MCA-103|Computer Based Numerical & Statistical Technique",
                            "MCA-104|Combinatorics & Graph Theory",
                            "MCA-105|System Analysis & Design",
                            "MCA-106|Fundamental of Information Technology"];
                    } else if (listvalue == "MCA" && listvalue2 == "II") {
                        var optionArray = ["|Select Subject : ",
                            "MCA-201|Object Oriented Programming With C++",
                            "MCA-202|Data Structure",
                            "MCA-203|Discrete Mathematics",
                            "MCA-204|Operating System",
                            "MCA-205|E-Governance",
                            "MCA-206|Unix & Shell Programming"];
                    } else if (listvalue == "MCA" && listvalue2 == "III") {
                        var optionArray = ["|Select Subject : ",
                            "MCA-301|Internet & JAVA Programming",
                            "MCA-302|Analysis & Design of Algorithm",
                            "MCA-303|Database Management System",
                            "MCA-304|Simulation & Modelling",
                            "MCA-305|Web Technologies",
                            "ECA-301|Advanced Operating System",
                            "ECA-302|E-Commerce",
                            "ECA-303|Software Project Management"];
                    } else if (listvalue == "MCA" && listvalue2 == "IV") {
                        var optionArray = ["|Select Subject : ",
                            "MCA-401|Advanced JAVA",
                            "MCA-402|Data Communication & Computer Networks",
                            "MCA-403|Software Engineering",
                            "MCA-404|Computer Graphics",
                            "ECA-401|Advanced DBMS",
                            "ECA-402|Digital Image Processing",
                            "ECA-403|Artificial Intelligence",
                            "ECA-411|Multimedia Communications",
                            "ECA-412|Bio-Informatics",
                            "ECA-413|Mobile & Adhoc Computing",
                            "ECA-414|Big Data Analysis"];
                    } else if (listvalue == "MCA" && listvalue2 == "V") {
                        var optionArray = ["|Select Subject : ",
                            "MCA-501|.Net Technology With C#",
                            "MCA-502|Data Mining",
                            "MCA-503|Cryptography & Network Security",
                            "MCA-504|Software Testing & Quality Assurance",
                            "ECA-501|Intellectual Property and Entrepreneurship Skill",
                            "ECA-502|Real Time Systems",
                            "ECA-503|Client Server Computing",
                            "ECA-511|Web Mining",
                            "ECA-512|Soft Computing",
                            "ECA-513|Cloud Computing",
                            "ECA-514|Internet of Things"];
                    }

                    for (option in optionArray) {
                        var pair = optionArray[option].split("|");
                        var newOption = document.createElement("option");
                        newOption.value = pair[0];
                        newOption.innerHTML = pair[1];
                        subcode.options.add(newOption);
                    }
                }
            </script>
        </div>
    </body>
</html>
