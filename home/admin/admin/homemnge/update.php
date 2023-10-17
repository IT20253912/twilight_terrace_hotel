<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

// Create a connection to the database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the deadline date from the form
$deadline = $_POST['deadline'];

// Check if there is a record in the database
$query = "SELECT * FROM deadlines";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Update the existing record
    $updateQuery = "UPDATE deadlines SET deadline_date='$deadline' WHERE id=1";
    if (mysqli_query($con, $updateQuery)) {
        echo "Deadline updated successfully.";
    } else {
        echo "Error updating deadline: " . mysqli_error($con);
    }
} else {
    // Insert a new record if it doesn't exist
    $insertQuery = "INSERT INTO deadlines (id, deadline_date) VALUES (1, '$deadline')";
    if (mysqli_query($con, $insertQuery)) {
        echo "Deadline inserted successfully.";
    } else {
        echo "Error inserting deadline: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
