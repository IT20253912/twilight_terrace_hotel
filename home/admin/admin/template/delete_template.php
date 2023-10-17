<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$template_id = $_GET['id'];

// Perform the template deletion based on the ID
$query = "DELETE FROM templates WHERE template_id = $template_id";

if (mysqli_query($con, $query)) {
    // echo "Template deleted successfully!";
    header("location:view_templates.php");
} else {
    echo "Error deleting template: " . mysqli_error($con);
}

mysqli_close($con);
?>
s