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
    <h1>Send Emails</h1>
     <a href="../adminhome/home/index.php">Admin Panel</a> | <a href="filter.php">Filter Users</a>
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
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $template_id = $_GET['id'];
    $query = "SELECT * FROM templates WHERE template_id = $template_id";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $template_name = $row['template_name'];
        $template_description = $row['template_description'];
        echo "<h2>Edit Template</h2>";
        echo "<div style='width: 50%; margin: 0 auto; background-color: #f0f0f0; padding: 20px;border-radius: 10px;'>";
        echo "<form action='update_template.php' method='post'>";
        echo "<input type='hidden' name='template_id' value='$template_id'>";
        echo "<div style='margin-bottom: 10px;'>
                  <label for='template_name'>Template Name:</label>
                  <input type='text' name='template_name' value='$template_name' style='width: 100%;'>
              </div>";
        echo "<div style='margin-bottom: 10px;'>
                  <label for='template_description'>Template Description:</label><br>
                  <textarea name='template_description' rows='10' cols='50' style='width: 100%;'>$template_description</textarea>
              </div>";
        echo "<div>
                  <input type='submit' value='Save' style='background-color: lightblue;border-radius: 10px; padding: 10px 20px;'>
              </div>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Template not found.";
    }
}
mysqli_close($con);
?>

