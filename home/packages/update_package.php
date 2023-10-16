<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $count = $_POST['count'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        $update_sql = "UPDATE packages SET package_name='$package_name', description='$description', count=$count, location='$location', price=$price, image='$image' WHERE id = $id";
    } else {
        $update_sql = "UPDATE packages SET package_name='$package_name', description='$description', count=$count, location='$location', price=$price WHERE id = $id";
    }

    if (mysqli_query($con, $update_sql)) {
        echo "Package updated successfully.";
        header("location: manage_packages.php");
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($con);
    }
}
?>
