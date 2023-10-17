<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = mysqli_real_escape_string($con, $_POST["destination"]);
    $people = intval($_POST["people"]);
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $user_id = intval($_POST["user_id"]);

    $query = "INSERT INTO inquiries (user_id, destination, pax_number, checking_date, checkout_date) 
              VALUES ('$user_id', '$destination', $people, '$checkin', '$checkout')";

    if (mysqli_query($con, $query)) {
        echo "Inquiry saved successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
