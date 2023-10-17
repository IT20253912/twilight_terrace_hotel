<?php
// Check if an 'id' parameter is provided
if (isset($_GET['id'])) {
    // Establish a database connection (similar to the previous code)
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = $_GET['id'];

    // Retrieve user details by ID
    $sql = "SELECT * FROM availability WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Display detailed user information here
        echo "User ID: " . $user['id'] . "<br>";
        echo "First Name: " . $user['first_name'] . "<br>";
        echo "Last Name: " . $user['last_name'] . "<br>";
        // Add more fields as needed
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid user ID.";
}
?>
