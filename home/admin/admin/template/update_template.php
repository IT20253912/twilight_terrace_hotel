<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $template_id = $_POST['template_id'];
    $template_name = $_POST['template_name'];
    $template_description = $_POST['template_description'];

    // Update the template details in the database
    $query = "UPDATE templates SET template_name = '$template_name', template_description = '$template_description' WHERE template_id = $template_id";

    if (mysqli_query($con, $query)) {
        // echo "Template updated successfully!";
        header("location:view_templates.php");
    } else {
        echo "Error updating template: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
