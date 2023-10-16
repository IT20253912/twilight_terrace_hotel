<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

// Create a connection to the database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Check if the `users` table exists and create it if not
$create_table_sql = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `form_access` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
if ($con->query($create_table_sql) === false) {
    die("Error creating the `users` table: " . $con->error);
}

// Process the registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if the email already exists in the 'users' table
    $check_sql = "SELECT * FROM users WHERE email = ?";
    if ($check_stmt = $con->prepare($check_sql)) {
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            // User with this email already exists, display an error message
            echo "User with this email already registered.";
            $check_stmt->close();
        } else {
            // Insert user data into the 'users' table
            $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            if ($stmt = $con->prepare($insert_sql)) {
                $stmt->bind_param("sss", $username, $email, $password);
                if ($stmt->execute()) {
                    // Send an email to the user
                    $subject = "Registration Successful";
                    $message = "Dear $username,<br><br>";
                    $message .= "Your registration was successful. Here are your login details:<br>";
                    $message .= "Email ID: $email<br>";
                    $message .= "Password: Your password is securely stored<br><br>";
                    $message .= "Thank you for registering with us!<br><br>";
                    $message .= "Best regards,<br>Twilight Terrace Hotel";

                    // Include PHPMailer and configure SMTP settings
                    require 'phpmailer/src/Exception.php';
                    require 'phpmailer/src/PHPMailer.php';
                    require 'phpmailer/src/SMTP.php';

                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'mail.dinuda.com';  // GMail SMTP server address
                    $mail->SMTPAuth = true;
                    $mail->Username = 'twilightterracehotel@dinuda.com';  // Your GMail email address
                    $mail->Password = 'Chathu@0604';  // Your GMail password
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;  // Port number for SSL
                    $mail->setFrom('twilightterracehotel@dinuda.com');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;

                    // Send the email
                    if ($mail->send()) {
                        echo "Registration and email sent successfully!";
                    } else {
                        echo "Email sending failed. Error: " . $mail->ErrorInfo;
                    }

                    // Registration successful, redirect to login page
                    header("location: index.php");
                } else {
                    echo "Registration failed.";
                }
                $stmt->close();
            }
        }
        $check_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>User registration form</title>
</head>
<body>
<div class="login">
    <img src="assets/img/forgot-bg.jpg" alt="image" class="login__bg">

    <form action="" class="login__form" method="post">
        <h1 class="login__title">User Registration</h1>

        <div class="login__inputs">
            <div class="login__box">
                <input type="text" placeholder="Create User Name" class="login__input" name="username" required>
                <i class="ri-user-fill"></i>
            </div>
            <div class="login__box">
                <input type="email" placeholder="Enter your Email" class="login__input" name="email" required>
                <i class="ri-mail-fill"></i>
            </div>
            <div class="login__box">
                <input type="password" placeholder="Create New Password" class="login__input" name="password" required>
                <i class="ri-lock-2-fill"></i>
            </div>
            <div class="login__box">
                <input type="password" placeholder="Re-enter your Password" class="login__input" name="confirm_password" required>
                <i class="ri-lock-2-fill"></i>
            </div>
        </div>

        <div class="login__check">
            <!-- <div class="login__check-box">
                <input type="checkbox" class="login__check-input" id="user-check">
                <label for "user-check" class="login__check-label">Remember me</label>
            </div> -->
        </div>

        <button type="submit" class="login__button" value="Register">Register</button>
    </form>
</div>
</body>
</html>
