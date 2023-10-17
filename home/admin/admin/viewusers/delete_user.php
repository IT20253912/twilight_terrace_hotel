<?php
include('connection.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // You might want to perform some validation on $userId to ensure it's a valid integer.

    // First, delete related records in password_reset_tokens
    $deleteTokensQuery = "DELETE FROM password_reset_tokens WHERE user_id = $userId";
    $resultDeleteTokens = mysqli_query($con, $deleteTokensQuery);

    if ($resultDeleteTokens) {
        // Related tokens deleted, now delete the user
        $deleteUserQuery = "DELETE FROM users WHERE id = $userId";
        $resultDeleteUser = mysqli_query($con, $deleteUserQuery);

        if ($resultDeleteUser) {
            // User deleted successfully, you can redirect back to the user list.
            header("Location: view.php"); // Change 'user_list.php' to the page you want to redirect to.
            exit();
        } else {
            die("Query failed: " . mysqli_error($con));
        }
    } else {
        die("Query failed: " . mysqli_error($con));
    }
} else {
    // Handle the case where 'id' is not set in the URL or not a valid integer.
    echo "Invalid user ID or missing user ID in the URL.";
}
mysqli_close($con);
?>
