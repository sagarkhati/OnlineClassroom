<?PHP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!defined('MyConst')) {
    die('Access Denied!');
}

include 'database/connection.php';
if (isset($_POST["student"])) {
    extract($_POST);

    $query = " SELECT * FROM login WHERE email_id = '$email' ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Account is alredy exist with email ' . $email . ' ")</script>';
    } else {

        $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890!$/()*';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);

        $hashPass = password_hash($pwd, PASSWORD_BCRYPT);

        $query = "INSERT INTO login VALUES ('$email', '$hashPass', 'S', '0', '$token', now())";
        mysqli_query($link, $query);

        require 'PHPMailer/Exception.php';
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';

        $mail = new PHPMailer();

        try {
            $mail->Host = "smtp.gmail.com";
            //$email->isSMTP();
            $mail->SMTPAuth = TRUE;
            $mail->Username = "onlineclassroom2019@gmail.com";
            $mail->Password = "OnlineClassroom@123";
            $mail->SMTPSecure = "ssl"; // or tls
            $mail->Port = 465; // or 587 if tls

            $mail->addAddress($email);
            $mail->setFrom('onlineclassroom2019@gmail.com', 'Online College');
            $mail->Subject = 'Verify your email!';
            $mail->isHTML(true);
            $mail->Body = 'Dear ' . $name . ',<br>To verify your account please click on the below link: <br><br> '
                    . '<a href="http://localhost/gbpietscholars/confirm.php?email=' . $email . '&token=' . $token . '">http://localhost/gbpietscholars/confirm.php</a>';
            $mail->send();
        } catch (Exception $e) {
            echo '<script>alert("Message could not be sent. Mailer Error: {' . $mail->ErrorInfo . '}")</script>';
        }

        $query = "INSERT INTO profilestudent VALUES ('$email', '$name', '$id', '$branch', '$sem', null)";
        $result = mysqli_query($link, $query);

        echo '<script>alert("You have been registered! Please verify your email...")</script>';
    }
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
<script lang="javascript" type="text/javascript">
    function dynamicdropdown() {
        var listvalue = document.getElementById('branch').value;

        sem.innerHTML = "";
        if (listvalue == "MCA") {
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
<div class="modal fade" id="signupstudentform">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><b>SignUp Form</b></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="login_wrap">
                        <div class="col-md-12 col-sm-6">
                            <form method="post" onsubmit="return validAllField2()"><br>
                                <div class="form-group">
                                    <label for="txt">Name : </label>
                                    <input type="text" class="form-control" id="name1" placeholder="Enter Your Name" name="name" required>
                                    <span id="message4"></span>
                                </div>
                                <div class="form-group">
                                    <label for="txt">ID : </label>
                                    <input type="text" class="form-control" id="roll" placeholder="college id" name="id">
                                    <span id="message5"></span>
                                </div>
                                <div class="form-group">
                                    <label for="sellist">Branch :</label>
                                    <select class="form-control" name="branch" id="branch" onchange="dynamicdropdown()">
                                        <option value="">SELECT BRANCH : </option>
                                        <?PHP echo getDepartmentList() ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sellist">Semester :</label>
                                    <select class="form-control" name="sem" id="sem">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email1" name="email" placeholder="Enter Your Email" required>
                                    <span id="message6"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Enter Password:</label>
                                    <input type="password" class="form-control" id="pwd1" name="pwd" placeholder="Enter Your Password" required>
                                    <span id="message7"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Re-Enter Password:</label>
                                    <input type="password" class="form-control" id="rpwd1" name="rpwd" placeholder="Re-Enter Your Password" required>
                                    <span id="message8"></span>
                                </div>
                                <button type="submit" class="btn btn-success" name="student">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>