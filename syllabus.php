<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Syllabus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

        <style>
            .syllbus {
                width: 30%;
                height: 30%;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid"><br>
            <div class="row">
                <div class="col-sm-12">
                    <?PHP include 'header2.php'; ?>
                </div>
            </div>
            <div style="padding: 10px; background-image: url('images/project/conference-background-poster-banner-science-and-technology-with-regard-to-banner-design-background-png.jpg'); background-repeat: no-repeat; background-size: 100%; background-attachment: fixed; width: 100%; height: 100%">
                <div class="row">
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER I</h4>
                            <img src="syllabus/sem1.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER II</h4>
                            <img src="syllabus/sem2.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER III</h4>
                            <img src="syllabus/sem3.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER IV</h4>
                            <img src="syllabus/sem4.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER V</h4>
                            <img src="syllabus/sem5.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                    <div class="col-sm-4"><br>
                        <center>
                            <h4>MCA SEMESTER VI</h4>
                            <img src="syllabus/sem6.png" alt="" class="syllbus"/><br>
                            <a href="pdf/course_mca_new.pdf" target="_blank"><b>View & Download</b></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
