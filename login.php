<?PHP
if (!defined('MyConst')) {
    die('Access Denied!');
}

if (isset($_POST['login'])) {
    extract($_POST);

    $query = "SELECT * FROM login WHERE email_id='$email'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (password_verify($pwd, $row[1])) {
            if ($row[3] == 0) {
                echo '<script>alert("First Verify your email!")</script>';
            } else {
                $_SESSION['email'] = $email;
                if ($row[2] == 'A') {
                    $_SESSION['role'] = 'A';
                    echo '<script>window.location.href = "admin/home_admin.php"</script>';
                } else if ($row[2] == 'T') {
                    $_SESSION['role'] = 'T';
                    echo '<script>window.location.href = "teacher/home_teacher.php"</script>';
                } else if ($row[2] == 'S') {
                    $_SESSION['role'] = 'S';
                    echo '<script>window.location.href = "student/home_student.php"</script>';
                } else if ($row[2] == 'P') {
                    $_SESSION['role'] = 'P';
                    echo '<script>window.location.href = "parent/home_parent.php"</script>';
                }
            }
        } else {
            echo '<script>alert("Invalid Credentials!")</script>';
        }
    } else {
        echo '<script>alert("Invalid Credentials!")</script>';
    }
}
?>
<div class="modal fade" id="loginform">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 20px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><b>Login Form</b></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="login_wrap">
                        <div class="col-xs-12">
                            <form method="POST"><br>
                                <div class="form-group">
                                    <label for="email">Email : </label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                                </div><br>
                                <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
