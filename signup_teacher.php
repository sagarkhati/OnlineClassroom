<?PHP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!defined('MyConst')) {
    die('Access Denied!');
}

include 'database/connection.php';
if (isset($_POST["teacher"])) {
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

        $query = "INSERT INTO login VALUES ('$email', '$hashPass', 'T', '0', '$token', now())";
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
                    . '<a href="http://localhost/gbpietscholars/confirm.php?email=' . $email . '&token=' . $token . '">http://localhost/gbpietscholars/confirm.php?email=$email&token=$token</a>';
            $mail->send();
        } catch (Exception $e) {
            echo '<script>alert("Message could not be sent. Mailer Error: {' . $mail->ErrorInfo . '}")</script>';
        }

        $query = "INSERT INTO profileteacher VALUES ('$email', '$name')";
        $result = mysqli_query($link, $query);

        echo '<script>alert("You have been registered! Please verify your email...")</script>';
    }
}
?>
<div class="modal fade" id="signupteacherform">
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
                            <form method="post" class="signupteacher" onsubmit="return validAllField()"><br>
                                <div class="form-group">
                                    <label for="txt">Name : </label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                                    <span id="message"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                                    <span id="message1"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Enter Password:</label>
                                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Your Password" required>
                                    <span id="message2"></span>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Re-Enter Password:</label>
                                    <input type="password" class="form-control" id="rpwd" name="rpwd" placeholder="Re-Enter Your Password" required>
                                    <span id="message3"></span>
                                </div>

                                <button type="submit" class="btn btn-success" name="teacher">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
