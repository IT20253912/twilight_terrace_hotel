<?php
// Include your database connection code here
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = mysqli_real_escape_string($con, $_POST["destination"]);
    $people = intval($_POST["people"]);
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $user_id = intval($_POST["user_id"]); // Retrieve the user ID from the form

    // Insert the data into the database
    $query = "INSERT INTO inquiries (user_id, destination, pax_number, checking_date, checkout_date) 
              VALUES ('$user_id', '$destination', $people, '$checkin', '$checkout')";

    if (mysqli_query($con, $query)) {
        // Data inserted successfully
        echo "Inquiry saved successfully.";
    } else {
        // Handle the case where data insertion fails
        echo "Error: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
