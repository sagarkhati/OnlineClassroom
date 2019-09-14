<?PHP
session_start();
define('MyConst', TRUE);
if (!isset($_SESSION['email']) || $_SESSION['role']!='S') {
    header('location: ../index.php');
}

if(!isset($_GET['code'])){
    die('Access Denied');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?PHP extract($_GET); echo $code; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
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
                <div class="col-sm-2">
                    <ul>
                        <a href="subject_content.php?code=<?PHP echo $code ?>"><li class="well" style="list-style: none;margin-left: -40px">Content</li></a>
                        <a href="attendance.php?code=<?PHP echo $code ?>"><li class="well" style="list-style: none;margin-left: -40px">Attendance</li></a>
              
                    </ul>
                </div>
                <div class="col-sm-10">
                    
                </div>
            </div>
        </div>
    </body>
</html>
