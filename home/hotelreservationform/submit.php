<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ./user/user/index.php");
    exit();
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    // Add code to retrieve other form fields here

    if (isset($_POST["reservation_id"]) && !empty($_POST["reservation_id"])) {
        $reservation_id = $_POST["reservation_id"];
        $sql = "UPDATE reservations SET arrival_date = ?, departure_date = ?, first_name = ?, last_name = ?, email = ?, phone = ?, adults = ?, children = ?, room_pref = ? WHERE id = ? AND user_id = ?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("ssssssiiii", $arrival, $departure, $first_name, $last_name, $email, $phone, $adults, $children, $room_pref, $reservation_id, $user_id);
            if ($stmt->execute()) {
                // header("location: success.php");
                $successMessage = "Reservation updated successfully!";
            } else {
                echo "Update failed.";
            }
            $stmt->close();
        }
    } else {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $adults = $_POST["adults"];
        $children = $_POST["children"];
        $room_pref = $_POST["room_pref"];

        $sql = "INSERT INTO reservations (user_id, arrival_date, departure_date, first_name, last_name, email, phone, adults, children, room_pref) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("isssssiiis", $user_id, $arrival, $departure, $first_name, $last_name, $email, $phone, $adults, $children, $room_pref);
            if ($stmt->execute()) {
                // header("location: success.php");
                $successMessage = "Reservation submitted successfully!";
            } else {
                echo "Reservation failed.";
            }
            $stmt->close();
        }
    }
}
?>
