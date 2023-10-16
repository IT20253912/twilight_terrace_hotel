<?php
include 'db_connect.php'; // Include the database connection file

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $room_pref = $_POST['room_pref'];

    // Insert data into the reservations table
    $sql = "INSERT INTO reservations (arrival, departure, first_name, last_name, email, phone, adults, children, room_pref) VALUES ('$arrival', '$departure', '$first_name', '$last_name', '$email', '$phone', '$adults', '$children', '$room_pref')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully created!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
