<?php
include('connection.php'); 
$searchEmail = '';
$searchResults = [];

if (isset($_POST['search'])) {
    $searchEmail = $_POST['searchEmail'];
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
            border-radius: 5px;
            display: inline-block;
            min-width: 120px; /* Set a minimum width for buttons */
        }

        .actions a.remove {
            background-color: #FF0000;
        }

        .actions a.edit {
            background-color: #00FF00;
        }

        .actions a.button-group {
            white-space: nowrap; /* Prevent line breaks for buttons */
        }
        
    </style>
</head>
<body>

<div class="title-bar">
    <h1>Manage Users</h1>
    <a href="../adminhome/home">Admin Panel</a> |
    <a href="search.php">Search User</a>
</div>
<br />
<div >
<?php
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th>Actions</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['registration_date'] . "</td>";
        echo "<td class='actions button-group'>

            
        
            <a href='delete_user.php?id=" . $row['id'] . "' class='remove'>Remove User</a>
        </td>";
        echo "</tr>";
    }

    mysqli_close($con);
    ?>
</table>

</div>

</body>
</html>
