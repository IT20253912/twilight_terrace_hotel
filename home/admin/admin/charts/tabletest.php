<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve the required information
$sql = "SELECT CONCAT(first_name, ' ', last_name) AS full_name,
               confirmation_participation AS who_can_participate,
               dates_of_participation AS which_days_participation,
               accommodation_needed AS who_wants_accommodations,
               dates_accommodation_required AS which_dates_need_accommodation
        FROM availability";

$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<html>";
        echo "<head>";
        echo "<style>";
        echo "table {";
        echo "    font-family: Arial, Helvetica, sans-serif;";
        echo "    border-collapse: collapse;";
        echo "    width: 100%;";
        echo "}";
        echo "table th, table td {";
        echo "    border: 1px solid #ddd;";
        echo "    padding: 8px;";
        echo "    text-align: left;";
        echo "}";
        echo "table tr:nth-child(even) {";
        echo "    background-color: #f2f2f2;";
        echo "}";
        echo "table th {";
        echo "    background-color: #4CAF50;";
        echo "    color: white;";
        echo "}";
        echo "div.chart-container {";
        echo "    display: flex;";
        echo "    justify-content: space-between;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";

        echo "<h2>Availability Table</h2>";

        // Create a div container for the first two charts
        echo "<div class='chart-container'>";
        
        // Display the first chart
        echo "<div>";
        echo "<div id='chartContainer1' style='height: 370px; width: 45%;'></div>";
        echo "</div>";

        // Display the second chart
        echo "<div>";
        echo "<div id='chartContainer2' style='height: 370px; width: 45%;'></div>";
        echo "</div>";

        // Close the div container for the first two charts
        echo "</div>";

        // Your table code here...
        echo "<h2>Availability Table</h2>";
        echo "<table>";
        echo "<tr><th>Full Name</th><th>Who Can Participate</th><th>Which Days Participation</th><th>Who Wants Accommodations</th><th>Which Dates Need Accommodation</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['who_can_participate'] . "</td>";
            echo "<td>" . $row['which_days_participation'] . "</td>";
            echo "<td>" . $row['who_wants_accommodations'] . "</td>";
            echo "<td>" . $row['which_dates_need_accommodation'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "No records found.";
    }
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>

