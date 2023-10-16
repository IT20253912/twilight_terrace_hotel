<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if ($action == 'update') {
        $select_package_sql = "SELECT * FROM packages WHERE id = $id";
        $package_result = mysqli_query($con, $select_package_sql);
        $package = mysqli_fetch_assoc($package_result);

        echo "<h2>Update Package</h2>";
        echo "<form action='update_package.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $package['id'] . "'>";
        echo "<label for='package_name'>Package Name:</label>";
        echo "<input type='text' name='package_name' value='" . $package['package_name'] . "' required><br>";
        echo "<label for='description'>Description:</label>";
        echo "<textarea name='description'>" . $package['description'] . "</textarea><br>";
        echo "<label for='count'>Count:</label>";
        echo "<input type='number' name='count' value='" . $package['count'] . "' required><br>";
        echo "<label for='location'>Location:</label>";
        echo "<input type='text' name='location' value='" . $package['location'] . "'><br>";
        echo "<label for='price'>Price:</label>";
        echo "<input type='text' name='price' value='" . $package['price'] . "' required><br>";
        echo "<input type='submit' value='Update Package'>";
        echo "</form>";
    } elseif ($action == 'delete') {
        $delete_sql = "DELETE FROM packages WHERE id = $id";
        if (mysqli_query($con, $delete_sql)) {
            echo "Package deleted successfully.";
            header("location: manage_packages.php");
        } else {
            echo "Error: " . $delete_sql . "<br>" . mysqli_error($con);
        }
    }
}

$select_sql = "SELECT * FROM packages";
$result = mysqli_query($con, $select_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Packages</title>
</head>
<body>
    <h1>Manage Packages</h1>
    <table border="1">
        <tr>
            <th>Package Name</th>
            <th>Description</th>
            <th>Count</th>
            <th>Location</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['package_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['count'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['image'] . "</td>";
            echo "<td>
                    <a href='manage_packages.php?action=update&id={$row['id']}'>Update</a>
                    <a href='manage_packages.php?action=delete&id={$row['id']}'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
