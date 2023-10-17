<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        /* Your CSS styles here for the user details page */
    </style>
</head>
<body>
    <h1>User Details</h1>

    <?php
    // Establish a database connection using your provided code
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'boxing';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    // Get the user ID from the URL parameter
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $user_id = $_GET['id'];

        // Query to retrieve user details based on the user_id
        $query = "SELECT * FROM availability WHERE id = $user_id";

        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Display user details here
                echo "<p><strong>Full Name:</strong> " . $row['first_name'] . " " . $row['last_name'] . "</p>";
                echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
                echo "<p><strong>Confirmation Participation:</strong> " . $row['confirmation_participation'] . "</p>";
                echo "<p><strong>Date of Participation:</strong> " . $row['dates_of_participation'] . "</p>";
                echo "<p><strong>Accommodation Needed:</strong> " . $row['accommodation_needed'] . "</p>";
                echo "<p><strong>Dates Accommodation Required:</strong> " . $row['dates_accommodation_required'] . "</p>";
                echo "<p><strong>Attend for Weigh In:</strong> " . $row['attend_for_weigh_in'] . "</p>";
                echo "<p><strong>User Role:</strong> " . $row['user_role'] . "</p>";
                echo "<p><strong>Official Leave Letter:</strong> " . $row['official_leave_letter'] . "</p>";
                echo "<p><strong>Official Leave Letter Description:</strong> " . $row['official_leave_letter_desc'] . "</p>";
                echo "<p><strong>Food Choice:</strong> " . $row['food_choice'] . "</p>";
                // Add more details as needed
            } else {
                echo "User not found.";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_free_result($result);
    } else {
        echo "Invalid user ID.";
    }

    mysqli_close($con);
    ?>

    <a href="viewawailability.php">Back to Availability Details</a>
</body>
</html>
