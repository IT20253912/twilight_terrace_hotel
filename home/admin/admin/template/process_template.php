<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$template_name = $_POST['template_name'];
$template_description = $_POST['template_description'];

// Insert the template name and formatted description into your database
$query = "INSERT INTO templates (template_name, template_description) VALUES ('$template_name', '$template_description')";
if (mysqli_query($con, $query)) {
    // echo "Template created successfully!";
    header("location:view_templates.php");
     
} else {
    echo "Error creating template: " . mysqli_error($con);
}

mysqli_close($con);
?>
