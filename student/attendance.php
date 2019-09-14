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
        <title>Attendance</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../css/c3.css">
        <style>
            #chart {display:inline-block;}
            #chart {width:65%;margin:10px;}
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
                        extract($_SESSION);
                        echo $code;
                        ?>"><li class="well" style="list-style: none;margin-left: -40px">Content</li></a>
                        <a href="attendance.php?code=<?PHP echo $code ?>"><li class="well" style="list-style: none;margin-left: -40px">Attendance</li></a>
                    </ul>
                    <input type="hidden" id="b" value="<?PHP echo $code ?>">
                    <input type="hidden" id="c" value="<?PHP echo $email ?>">
                </div>
                <div class="col-sm-3">
                    <center>
                        <h2>Attendance (in %): </h2><hr><br>
                        <?PHP
                        extract($_SESSION);
                        extract($_GET);
                        include_once '../database/connection.php';
                        $query = "SELECT `totalpresent` / `totalclass` * 100 AS `%attendance` FROM attendance WHERE studentname='$email' and subjectcode='$code' ";
                        $result = mysqli_query($link, $query);
                        if (!mysqli_query($link, $query)) {
                            echo mysqli_errno($link);
                        }
                        $row = mysqli_fetch_array($result);
                        ?>
                        <input class="knob" value="<?PHP echo round($row[0]) ?>" data-readonly="true" data-thickness=".4" readonly="readonly" data-width="50" data-height="50" data-angleOffset=180 data-fgColor="#87AB66" data-bgColor="#E1EAD9">

                    </center>
                </div>
                <div class="col-sm-7">
                    <center>
                        <h2> Daily Attendance : <a id="show">Click Here  </a></h2><hr><br> 
                        <div id="chart">
                    </center>
                </div>
            </div>
        </div>
        <script src="../js/jquery.knob.js"></script>
        <script src="../js/highcharts.js"></script>
        <script src="../js/highcharts-exporting.js"></script>
        <script>
            $('.knob').knob();
            $("#show").click(function () {
                var b = $("#b").val();
                var s = $("#c").val();
                $.ajax({
                    url: 'get_attendance.php',
                    type: 'post',
                    data: {code: b, email: s},
                    dataType: 'json',
                    success: function (r) {
                        console.log(r);
                        generateGraph(r);
                    },
                    error: function (r) {
                        console.log(r);
                    }
                });
            });
            function generateGraph(data) {
                $('#chart').highcharts({
                    chart: {type: 'column'},
                    title: {text: 'Attendance Tracker', x: -20},
                    subtitle: {text: '', x: -20},
                    xAxis: {gridLineWidth: 0, title: 'Dates', categories: $.map(data, function (v, k) {
                            return k;
                        })},
                    yAxis: {
                        gridLineWidth: 0,
                        title: {text: 'Presence'}
                    },
                    legend: {layout: 'vertical', align: 'right', verticalAlign: 'middle', borderWidth: 0},
                    series: [{name: 'Presence', data: $.map(data, function (v, k) {
                                return v;
                            }), color: '#D10057'}]
                });
            }
        </script>
    </div>
</body>
</html>
