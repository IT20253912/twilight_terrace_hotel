<?php
// Database connection
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Get data from the form
$package_name = $_POST['package_name'];
$description = $_POST['description'];
$count = $_POST['count'];
$location = $_POST['location'];
$price = $_POST['price'];

// Handle image upload
$image = $_FILES['image']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

// Insert data into the database
$sql = "INSERT INTO packages (package_name, description, count, location, price, image) VALUES ('$package_name', '$description', $count, '$location', $price, '$image')";
if (mysqli_query($con, $sql)) {
    echo "Package added successfully.";
    header("location: manage_packages.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
