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

$user_id = $_SESSION["user_id"];
$existing_reservation = null;

$sql = "SELECT * FROM reservations WHERE user_id = ?";
if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $existing_reservation = $result->fetch_assoc();
    }
    $stmt->close();
}

// Get the user's email from the session
$email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <title>Hotel Reservation Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="hotel-reservation-form" method="post" action="submit.php">
        <h1><i class="far fa-calendar-alt"></i>Hotel Reservation Form</h1>
        <div class="fields">
            <div class="wrapper">
                <div>
                    <label for="arrival">Arrival</label>
                    <div class="field">
                        <input id="arrival" type="date" name="arrival" required>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for="departure">Departure</label>
                    <div class="field">
                        <input id="departure" type="date" name="departure" required>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div>
                    <label for="first_name">First Name</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input id="first_name" type="text" name="first_name" placeholder="First Name" required>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for="last_name">Last Name</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input id="last_name" type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <label for="email">Email</label>
            <div class="field">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" placeholder="Your Email" required value="<?php echo $email; ?>">
            </div>
            <label for="phone">Phone</label>
            <div class "field">
                <!-- <i class="fas fa-phone"></i> -->
                <input id="phone" type="tel" name="phone" placeholder="Your Phone Number" required>
            </div>
            <div class="wrapper">
                <div>
                    <label for="adults">Adults</label>
                    <div class="field">
                        <select id="adults" name="adults" required>
                            <option disabled selected value="">--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for "children">Children</label>
                    <div class="field">
                        <select id="children" name="children" required>
                            <option disabled selected value="">--</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
            <label for="room_pref">Room Preference</label>
            <div class="field">
                <select id="room_pref" name="room_pref" required>
                    <option disabled selected value="">--</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
            <input type="submit" value="Reserve">
        </div>
    </form>
</body>
</html>
