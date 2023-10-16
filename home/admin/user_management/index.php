<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Function to fetch all user data from the 'users' table
function getAllUsers($con) {
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);
    $users = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}

// Function to edit user data
function editUser($con, $id, $username, $email, $password, $form_access) {
    $query = "UPDATE users 
              SET username = '$username', email = '$email', password = '$password', form_access = $form_access
              WHERE id = $id";
    return mysqli_query($con, $query);
}

// Function to delete a user by ID
function deleteUser($con, $id) {
    $query = "DELETE FROM users WHERE id = $id";
    return mysqli_query($con, $query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit_user"])) {
        $id = $_POST["edit_id"];
        $username = $_POST["edit_username"];
        $email = $_POST["edit_email"];
        $password = $_POST["edit_password"];
        $form_access = $_POST["edit_form_access"];
        editUser($con, $id, $username, $email, $password, $form_access);
    } elseif (isset($_POST["delete_user"])) {
        $id = $_POST["delete_id"];
        deleteUser($con, $id);
    }
}

$users = getAllUsers($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Form Access</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user["id"] ?></td>
                <td><?= $user["username"] ?></td>
                <td><?= $user["email"] ?></td>
                <td><?= $user["password"] ?></td>
                <td><?= $user["form_access"] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="edit_id" value="<?= $user["id"] ?>">
                        <input type="text" name="edit_username" value="<?= $user["username"] ?>">
                        <input type="text" name="edit_email" value="<?= $user["email"] ?>">
                        <input type="text" name="edit_password" value="<?= $user["password"] ?>">
                        <input type="number" name="edit_form_access" value="<?= $user["form_access"] ?>">
                        <input type="submit" name="edit_user" value="Edit">
                    </form>
                    <form method="post">
                        <input type="hidden" name="delete_id" value="<?= $user["id"] ?>">
                        <input type="submit" name="delete_user" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
