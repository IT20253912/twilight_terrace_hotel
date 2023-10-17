<?php


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to count the number of users who need accommodation
$sqlNeedAccommodation = "SELECT COUNT(*) as count FROM availability WHERE accommodation_needed = 'Yes'";
$resultNeedAccommodation = mysqli_query($con, $sqlNeedAccommodation);
$rowNeedAccommodation = mysqli_fetch_assoc($resultNeedAccommodation);
$countNeedAccommodation = $rowNeedAccommodation['count'];

// Query to count the number of users who don't need accommodation
$sqlNoNeedAccommodation = "SELECT COUNT(*) as count FROM availability WHERE accommodation_needed = 'No'";
$resultNoNeedAccommodation = mysqli_query($con, $sqlNoNeedAccommodation);
$rowNoNeedAccommodation = mysqli_fetch_assoc($resultNoNeedAccommodation);
$countNoNeedAccommodation = $rowNoNeedAccommodation['count'];

mysqli_close($con);
?>

<!DOCTYPE HTML>
<html>
<head>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Accommodation Preference"
        },
        subtitles: [{
            text: "Users Who Need Accommodation vs. Users Who Don't"
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode(array(
                array("label"=> "Need Accommodation", "y"=> $countNeedAccommodation),
                array("label"=> "Don't Need Accommodation", "y"=> $countNoNeedAccommodation)
            ), JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</body>
</html>
