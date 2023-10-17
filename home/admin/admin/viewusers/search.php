<?php
include('connection.php'); // Include your database connection file

// Initialize variables for search query and results
$searchEmail = '';
$searchResults = [];

if (isset($_POST['search'])) {
    // Get the email entered in the search form
    $searchEmail = $_POST['searchEmail'];

    // Perform a database query to search for players by email
    $query = "SELECT * FROM users WHERE email LIKE '%$searchEmail%'";
    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    } else {
        die("Query failed: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
        
        .title-bar {
            /* background-color: #007BFF; */
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
       

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .actions {
            text-align: center;
            
        }

        .actions a {
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            /* border-radius: 3px; */
            border-radius: 5px; /* Adding border-radius for rounded corners */
            display: inline-block; /* Ensuring proper spacing between buttons */
        }

        .actions a.remove {
            background-color: #FF0000; /* Red color for "Remove User" */
            
        }

        .actions a.edit {
            background-color: #00FF00; /* Green color for "Edit Personal Data" */
        }

        
    </style>
</head>
<body>

<div class="title-bar">
    <h1>Manage Users</h1>
    <a href="../adminhome/home">Admin Pannel</a> |
    <a href="view.php">View All Users</a>
</div>
<br />

<div class="search-container">
    <form method="post">
        <label for="searchEmail">Search Player by Email:</label>
        <input type="text" id="searchEmail" name="searchEmail" value="<?php echo $searchEmail; ?>" placeholder="Enter email...">
        <button type="submit" name="search" style="background-color: #007BFF; color: #fff;">Search</button>
    </form>
</div>
<br />

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th class="actions">Actions</th>
    </tr>

    <?php
    foreach ($searchResults as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['registration_date'] . "</td>";
        echo "<td class='actions'>
            <a href='view_personal_data.php?id=" . $row['id'] . "'>View Personal Data</a>
            <a href='delete_user.php?id=" . $row['id'] . "' class='remove'>Remove User</a>
        </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
