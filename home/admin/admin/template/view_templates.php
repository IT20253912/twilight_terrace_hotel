<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title-bar {
            background-color: #2d2d2e;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .title-bar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<div class="title-bar">
    <h1>Manage Templetes</h1>
     <a href="../adminhome/home/index.php">Admin Pannel</a> | <a href="../can/availability.php">All Users</a>
     | <a href="create_template.php">Add Templete</a>
</div>
</body>
</html>
<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM templates";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<html>";
    echo "<head>";
    echo "<style>";
    echo "table {";
    echo "  width: 80%; /* Adjust the width as needed */";
    echo "  margin: 0 auto; /* Center the table horizontally */";
    echo "  border-collapse: collapse;";
    echo "}";
    echo "th, td {";
    echo "  border: 1px solid #ddd;";
    echo "  padding: 8px;";
    echo "  text-align: left;";
    echo "}";
    echo "tr:nth-child(even) {";
    echo "  background-color: #f2f2f2;";
    echo "}";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h2>All Templates</h2>";
    echo "<table>";
    echo "<tr><th>Template Name</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $template_id = $row['template_id'];
        $template_name = $row['template_name'];
        echo "<tr>";
        echo "<td>$template_name</td>";
        echo "<td><a href='edit_template.php?id=$template_id'>Edit</a> | <a href='delete_template.php?id=$template_id'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
?>
