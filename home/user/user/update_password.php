<?php
session_start();
require 'db.php'; // Include your database connection code.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $token = $_POST["token"];
    $password = $_POST["password"];
    
    // Verify that the token is still valid and not expired.
    $current_time = date('Y-m-d H:i:s');
    $stmt = $con->prepare("SELECT user_id FROM password_reset_tokens WHERE token = ? AND expiration > ?");
    $stmt->bind_param("ss", $token, $current_time);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "Invalid or expired token.";
    } else {
        // Update the user's password.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed_password, $user_id);
        
        if ($stmt->execute()) {
            // Delete the used token from the database.
            $stmt = $con->prepare("DELETE FROM password_reset_tokens WHERE token = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            
            echo "Password updated successfully. You can now <a href='index.php'>login</a> with your new password.";
        } else {
            echo "Error updating password.";
        }
        $stmt->close();
    }
}
?>
