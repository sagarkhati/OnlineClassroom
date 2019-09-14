<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role'] != 'S') {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                    var optionArray = ["|Select Semester : ", "I|I", "II|II", "III|III", "IV|IV", "V|V", "VI|VI", "VII|VII", "VIII|VIII"];
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

            <?PHP
            include '../database/connection.php';

            $email = $_SESSION['email'];

            $query = " SELECT * FROM profilestudent WHERE email_id = '$email' ";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            ?>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <center><h1><b>User Details</b></h1></center><hr><br>
                    <form action="profile.php" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" value="<?PHP echo $row[0] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?PHP echo $row[1] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?PHP echo $row[2] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="branch" id="branch" onchange="dynamicdropdown()" required>
                                <option>SELECT BRANCH : </option>
                                <option id="MCA">MCA</option>
                                <option id="CSE">CSE</option>
                                <option id="CE">CE</option>
                                <option id="ME">ME</option>
                                <option id="BT">BT</option>
                                <option id="EE">EE</option>
                                <option id="ECE">ECE</option>
                            </select>
                        </div>
                        <?PHP echo '<script>document.getElementById("' . $row[3] . '").setAttribute("selected","true")</script>'; ?>
                        <div class="form-group">
                            <select class="form-control" name="sem" id="sem" required>
                                <?PHP if ($row[3] == "MCA") { ?>
                                    <option>SELECT SEMESTER : </option>
                                    <option id="I">I</option>
                                    <option id="II">II</option>
                                    <option id="III">III</option>
                                    <option id="IV">IV</option>
                                    <option id="V">V</option>
                                    <option id="VI">VI</option>
                                <?PHP } else { ?>
                                    <option>SELECT SEMESTER : </option>
                                    <option id="I">I</option>
                                    <option id="II">II</option>
                                    <option id="III">III</option>
                                    <option id="IV">IV</option>
                                    <option id="V">V</option>
                                    <option id="VI">VI</option>
                                    <option id="VII">VII</option>
                                    <option id="VIII">VIII</option>
                                <?PHP } ?>
                            </select>
                        </div>
                        <?PHP echo '<script>document.getElementById("' . $row[4] . '").setAttribute("selected","true")</script>'; ?>
                        <div class="form-group">
                            <select class="form-control" name="hostel" required>
                                <option>SELECT HOSTEL : </option>
                                <option id="Kailash">Kailash</option>
                                <option id="VH">VH</option>
                                <option id="120">120</option>
                                <option id="Kedar">Kedar</option>
                                <option id="Trishul">Trishul</option>
                                <option id="Bhagirathi">Bhagirathi</option>
                                <option id="Raman">Raman</option>
                                <option id="Neelkanth">Neelkanth</option>
                                <option id="120">120</option>
                                <option id="Alalnanda">Alaknanda</option>
                            </select>
                        </div>
                        <?PHP echo '<script>document.getElementById("' . $row[5] . '").setAttribute("selected","true")</script>'; ?>
                        <br><button type="submit" class="btn btn-success btn-block" name="submit" value="submit">Submit</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>
