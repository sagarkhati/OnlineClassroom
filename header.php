<?PHP
if (!defined('MyConst')) {
    die('Access Denied!');
}
?>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand active"><b>Online Classroom</b></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <?PHP
                    if (!isset($_SESSION['email'])) {
                        ?>
                        <li class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : '' ?>"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="<?= (basename($_SERVER['PHP_SELF']) == 'hometeacher.php') ? 'active' : '' ?>"><a href="#footer"><span class="glyphicon glyphicon-file"></span> About Us</a></li>
                        <li class="<?= (basename($_SERVER['PHP_SELF']) == 'hometeacher.php') ? 'active' : '' ?>"><a href="#services"><span class="glyphicon glyphicon-search"></span> Our Services</a></li>
                        <li class="<?= (basename($_SERVER['PHP_SELF']) == 'hometeacher.php') ? 'active' : '' ?>"><a href="#footer"><span class="glyphicon glyphicon-phone"></span> Contact Us</a></li>
                        <?PHP
                    } else {
                        if ($_SESSION['role'] == 'A') {
                            ?>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'home_admin.php') ? 'active' : '' ?>"><a href="home_admin.php"><span class="glyphicon glyphicon-home"> Home</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'classroom.php') ? 'active' : '' ?>"><a href="classroom.php"><span class="glyphicon glyphicon-education"></span> Classroom</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'syllabus.php') ? 'active' : '' ?>"><a href="../syllabus.php"><span class="glyphicon glyphicon-file"></span> Syllabus</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'old_que_paper.php') ? 'active' : '' ?>"><a href="../old_que_paper.php"><span class="glyphicon glyphicon-book"></span> Old Que Paper</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php"><span class="glyphicon glyphicon-envelope"></span> Notice Board</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php">New</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'inbox.php') ? 'active' : '' ?>"><a href="inbox.php">Inbox</a></li>              
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'sent_notice.php') ? 'active' : '' ?>"><a href="sent_notice.php">Sent</a></li>

                                </ul>
                            </li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'T') {
                            ?>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'home_teacher.php') ? 'active' : '' ?>"><a href="home_teacher.php" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'classrooms.php') ? 'active' : '' ?>"><a href="classrooms.php"><span class="glyphicon glyphicon-education"></span> Classroom</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'syllabus.php') ? 'active' : '' ?>"><a href="../syllabus.php"><span class="glyphicon glyphicon-file"></span> Syllabus</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'old_que_paper.php') ? 'active' : '' ?>"><a href="../old_que_paper.php"><span class="glyphicon glyphicon-book"></span> Old Que Paper</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php"><span class="glyphicon glyphicon-envelope"></span> Notice Board</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php">New</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'inbox.php') ? 'active' : '' ?>"><a href="inbox.php">Inbox</a></li>              
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'sent_notice.php') ? 'active' : '' ?>"><a href="sent_notice.php">Sent</a></li>

                                </ul>
                            </li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'S') {
                            ?>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'home_student.php') ? 'active' : '' ?>"><a href="home_student.php" ><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'classroom.php') ? 'active' : '' ?>"><a href="classroom.php"><span class="glyphicon glyphicon-education"></span> Classroom</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'syllabus.php') ? 'active' : '' ?>"><a href="../syllabus.php"><span class="glyphicon glyphicon-file"></span> Syllabus</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'old_que_paper.php') ? 'active' : '' ?>"><a href="../old_que_paper.php"><span class="glyphicon glyphicon-book"></span> Old Que Paper</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php"><span class="glyphicon glyphicon-envelope"></span> Notice Board</a></li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'P') {
                            ?>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'home_parent.php') ? 'active' : '' ?>"><a href="home_parent.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'classroom.php') ? 'active' : '' ?>"><a href="classroom.php">Classroom</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'syllabus.php') ? 'active' : '' ?>"><a href="../syllabus.php">Syllabus</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'old_que_paper.php') ? 'active' : '' ?>"><a href="../old_que_paper.php">Old Que Paper</a></li>
                            <li class="<?= (basename($_SERVER['PHP_SELF']) == 'notice.php') ? 'active' : '' ?>"><a href="notice.php">Notice Board</a></li>
                            <?PHP
                        }
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?PHP
                    if (!isset($_SESSION['email'])) {
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#signupteacherform" data-toggle="modal" data-dismiss="modal" class="btn btn-xs uppercase">As Teacher</a></li>
                                <li><a href="#signupstudentform" data-toggle="modal" data-dismiss="modal" class="btn btn-xs uppercase">As Student</a></li>
                                <li><a href="#signupparentform" data-toggle="modal" data-dismiss="modal" class="btn btn-xs uppercase">As Parents</a></li>
                            </ul>
                        </li>
                        <li><a href="#loginform" data-toggle="modal" data-dismiss="modal" class="btn btn-xs uppercase"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?PHP
                    } else {
                        if ($_SESSION['role'] == 'A') {
                            ?>
                            <li class="active">
                                <img src="https://storage1-beyazpano-com.s3.amazonaws.com/avatar/predefined/small/avatar1.png" width="50" height="50">   
                                <a class="userName" style="float: right">
                                    <span><b><i>Logged In As</i> : ADMIN</b></span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'add_subject.php') ? 'active' : '' ?>"><a href="add_subject.php">Add Subject</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'del_subject.php') ? 'active' : '' ?>"><a href="del_subject.php">Delete Subject</a></li>              
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'add_department.php') ? 'active' : '' ?>"><a href="add_department.php">Add Department</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'del_department.php') ? 'active' : '' ?>"><a href="del_department.php">Delete Department</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'change_password.php') ? 'active' : '' ?>"><a href="../change_password.php">Change Password</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'upload_que_paper.php') ? 'active' : '' ?>"><a href="../upload_que_paper.php">Upload Question Paper</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../logout.php">Log Out</a></li>
                                </ul>
                            </li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'T') {
                            ?>
                            <li class="active">
                                <img src="https://storage1-beyazpano-com.s3.amazonaws.com/avatar/predefined/small/avatar1.png" width="50" height="50">   
                                <a class="userName" style="float: right">
                                    <?PHP
                                    extract($_SESSION);

                                    include '../database/connection.php';

                                    $query = "SELECT name FROM profileteacher WHERE email_id='$email'";
                                    $result = mysqli_query($link, $query);
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <span><b><?PHP echo $row[0]; ?></b></span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="create_classroom.php">Create Classroom</a></li>
                                    <li><a href="../change_password.php">Change Password</a></li>
                                    <li><a href="../upload_que_paper.php">Upload Question Paper</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../logout.php">Log Out</a></li>
                                </ul>
                            </li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'S') {
                            ?>
                            <li class="active">
                                <img src="https://storage1-beyazpano-com.s3.amazonaws.com/avatar/predefined/small/avatar1.png" width="50" height="50">   
                                <a class="userName" style="float: right">
                                    <?PHP
                                    extract($_SESSION);

                                    include '../database/connection.php';

                                    $query = "SELECT name FROM profilestudent WHERE email_id='$email'";
                                    $result = mysqli_query($link, $query);
                                    $row = mysqli_fetch_array($result);
                                    ?>
                                    <span><b><?PHP echo $row[0]; ?></b></span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'profile.php') ? 'active' : '' ?>"><a href="profile.php">Profile</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'change_password.php') ? 'active' : '' ?>"><a href="../change_password.php">Change Password</a></li>
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'upload_que_paper.php') ? 'active' : '' ?>"><a href="../upload_que_paper.php">Upload Question Paper</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../logout.php">Log Out</a></li>
                                </ul>
                            </li>
                            <?PHP
                        } else if ($_SESSION['role'] == 'P') {
                            ?>
                            <li class="active">
                                <img src="https://storage1-beyazpano-com.s3.amazonaws.com/avatar/predefined/small/avatar1.png" width="50" height="50">   
                                <a class="userName" style="float: right">
                                    <?PHP
                                    extract($_SESSION);
                                    ?>
                                    <span><b><?PHP echo $email; ?></b></span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li class="<?= (basename($_SERVER['PHP_SELF']) == 'change_password.php') ? 'active' : '' ?>"><a href="../change_password.php">Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../logout.php">Log Out</a></li>
                                </ul>
                            </li>
                            <?PHP
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script>
    $('document').ready(function () {
        $('.nav').on('click', 'li', function () {
            $('.nav li.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>