<?php
session_start();
define('MyConst', TRUE);
include 'database/connection.php';
if (isset($_SESSION['email'])) {
    if ($_SESSION['role'] == 'A') {
        header('location: admin/home_admin.php');
    } else if ($_SESSION['role'] == 'T') {
        header('location: teacher/home_teacher.php');
    } else if ($_SESSION['role'] == 'S') {
        header('location: student/home_student.php');
    } else if ($_SESSION['role'] == 'P') {
        header('location: parent/home_parent.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>

        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP require 'header.php'; ?>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="carousel slide" data-ride="carousel" id="myCarousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/Online Classroom.jpg" alt="" width="100%"/>
                                <div class="carousel-caption">
                                    <h3>Online Classroom</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div><br>
            <h2 align="center"><b>Our Services</b></h2><br>
            <div class="row" id="services">
                <div class="col-sm-3">
                    <center>
                        <h3>Online Classroom</h3><br>
                        A place where you can get the study materials and check your attendance...
                    </center>
                </div>
                <div class="col-sm-3">
                    <center>
                        <h3>Notice Board</h3><br>
                        Admin or Faculty can send notice to the student and student can access the notice.
                    </center>
                </div>
                <div class="col-sm-3">
                    <center>
                        <h3>Previous Year Question Papers</h3>
                        A section where student can get previous year question paper...
                    </center>
                </div>
                <div class="col-sm-3">
                    <center>
                        <h3>Syllabus</h3><br>
                        A section from where user can view and download syllabus...
                    </center>
                </div>
            </div><br><br>
            <?PHP include 'footer.php'; ?>



        </div>
    </div><br><br>
    <?PHP include 'login.php'; ?>
    <?PHP include 'signup_teacher.php'; ?>
    <?PHP include 'signup_student.php'; ?>
    <?PHP include 'signup_parent.php'; ?>
    <script src="js/javascript.js" type="text/javascript"></script>
</body>
</html>