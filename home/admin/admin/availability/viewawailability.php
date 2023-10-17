<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability Details</title>
    <style>
        /* Your CSS styles here, as provided in the previous answer */
    </style>
</head>
<body>
    <h1>Availability Details</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Confirmation Participation</th>
                <th>User Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            // Query to fetch availability data from the database
            $query = "SELECT id, CONCAT(first_name, ' ', last_name) AS full_name, confirmation_participation, user_role FROM availability";

            $result = mysqli_query($con, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['confirmation_participation'] . "</td>";
                    echo "<td>" . $row['user_role'] . "</td>";
                    echo "<td>
                            <a href='view_details.php?id=" . $row['id'] . "'><button>View Details</button></a>
                            <a href='mailto:recipient@example.com?subject=Regarding Availability&body=Message to user " . $row['id'] . "'><button>Send Mail</button></a>
                          </td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </tbody>
    </table>
</body>
</html>
