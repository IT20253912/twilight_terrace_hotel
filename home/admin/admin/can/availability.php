
<!DOCTYPE html>
<html>
<head>
<style>
    
    .title-bar {
            background-color: #2d2d2e;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .title-bar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        /* Style for the table container */
        .table-container {
            width: 80%; /* Set the desired width */
            margin: 0 auto; /* Center the table horizontally */
        }

        /* Style for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            /* margin: 0 auto; */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the checkboxes */
        input[type="checkbox"] {
            transform: scale(1.5); /* Make the checkboxes larger */
        }

        /* Style for the submit button */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* Hover effect for the submit button */
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="title-bar">
    <h1>Reservations Management</h1>
      | <a href="../adminhome/home/index.php">Admin Pannel</a> | 
    
</div>
<br />


</body>
</html>



<?php
// Establish a database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'twilight_hotel';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve users with confirmation_participation set to "can"
$query = "SELECT u.username, u.email, r.arrival_date, r.departure_date, r.first_name, r.last_name, r.email as reservation_email, r.phone, r.adults, r.children, r.room_pref 
          FROM users u
          LEFT JOIN reservations r ON u.id = r.user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<form action='index.php' method='GET'>";
    echo "<table border='1'>
            <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Arrival Date</th>
            <th>Departure Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Reservation Email</th>
            <th>Phone</th>
            <th>Adults</th>
            <th>Children</th>
            <th>Room Preference</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['username']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['arrival_date']."</td>";
            echo "<td>".$row['departure_date']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['reservation_email']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['adults']."</td>";
            echo "<td>".$row['children']."</td>";
            echo "<td>".$row['room_pref']."</td>";
        echo "<td>
                <input type='checkbox' name='emails[]' value='" . $row['email'] . "'> Select
              </td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<input type='submit' value='Send Invitation'>";
    echo "</form>";
} else {
    echo "No users with confirmation_participation set to 'can' found.";
}

mysqli_close($conn);
?>
