



<!-- //new end -->

<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the 'availability' table based on participation status
$query = "SELECT confirmation_participation, COUNT(*) AS count FROM availability GROUP BY confirmation_participation";
$result = mysqli_query($con, $query);

$dataPoints = array();

while ($row = mysqli_fetch_assoc($result)) {
    $participationStatus = $row['confirmation_participation'];
    $count = $row['count'];

    // Create data points based on participation status
    $dataPoints[] = array("label" => $participationStatus, "y" => $count);
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE HTML>
<html>
<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Participant Status"
    },
    data: [{
        type: "pie",
        showInLegend: true,
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        yValueFormatString: "#,##0",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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


