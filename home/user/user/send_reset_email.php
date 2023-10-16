<?php
session_start();
require 'db.php'; // Include your database connection code.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Check if the email exists in your users table.
    $stmt = $con->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 0) {
        echo "Email not found.";
    } else {
        // Generate a unique token.
        $token = bin2hex(random_bytes(32));
        
        // Set a token expiration (e.g., 1 hour from now).
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // Insert the token into the password_reset_tokens table.
        $stmt = $con->prepare("INSERT INTO password_reset_tokens (user_id, token, expiration) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $token, $expiration);
        $user_id = $result->fetch_assoc()["id"];
        
        if ($stmt->execute()) {
            // Send a reset email with the token.
            $reset_link = "http://localhost/twilight_terrace_hotel/home/user/user/reset_password.php?token=$token";
            
            // Use your email sending code (PHPMailer) to send the email.
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'mail.dinuda.com'; // GMail SMTP server address
            $mail->SMTPAuth = true;
            $mail->Username = 'twilightterracehotel@dinuda.com'; // Your GMAIL USERNAME
            $mail->Password = 'Chathu@0604'; // Your GMAIL PASSWORD
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465; // PORT NUMBER FOR SSL

            $mail->setFrom('twilightterracehotel@dinuda.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Password Reset Request";
            $mail->Body = "To reset your password, click the following link: <a href='$reset_link'>$reset_link</a>";

            try {
                $mail->send();
                echo "Reset email sent. Check your inbox.";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            echo "Error inserting token into the database.";
        }
        $stmt->close();
    }
}
?>
