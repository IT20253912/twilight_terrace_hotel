<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'boxing';

// Try and connect to the database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
$registration_successful = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize variables
    $full_name = '';
    $name_with_initials = '';
    $date_of_birth = '';
    $schools_attend = '';
    $highest_education_qualification = '';
    $current_occupation = '';
    $previous_occupation = '';
    $qualified_year_as_national_rj = '';
    $home_address = '';
    $contact_number = '';
    $whatsapp_number = '';
    $email = '';
    $id_number = '';
    $passport_number = '';
    $current_status_of_officials = '';
    $id_front_image = '';
    $id_back_image = '';
    $passport_image = '';
    $profile_photo = '';

    // Check if form fields are set before assigning values
    if (isset($_POST['full_name'])) {
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
    }
    if (isset($_POST['name_with_initials'])) {
        $name_with_initials = mysqli_real_escape_string($con, $_POST['name_with_initials']);
    }
    if (isset($_POST['date_of_birth'])) {
        $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
    }
    if (isset($_POST['schools_attend'])) {
        $schools_attend = mysqli_real_escape_string($con, $_POST['schools_attend']);
    }
    if (isset($_POST['highest_education_qualification'])) {
        $highest_education_qualification = mysqli_real_escape_string($con, $_POST['highest_education_qualification']);
    }
    if (isset($_POST['current_occupation'])) {
        $current_occupation = mysqli_real_escape_string($con, $_POST['current_occupation']);
    }
    if (isset($_POST['previous_occupation'])) {
        $previous_occupation = mysqli_real_escape_string($con, $_POST['previous_occupation']);
    }
    if (isset($_POST['qualified_year_as_national_rj'])) {
        $qualified_year_as_national_rj = mysqli_real_escape_string($con, $_POST['qualified_year_as_national_rj']);
    }
    if (isset($_POST['home_address'])) {
        $home_address = mysqli_real_escape_string($con, $_POST['home_address']);
    }
    if (isset($_POST['contact_number'])) {
        $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    }
    if (isset($_POST['whatsapp_number'])) {
        $whatsapp_number = mysqli_real_escape_string($con, $_POST['whatsapp_number']);
    }
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
    }
    if (isset($_POST['id_number'])) {
        $id_number = mysqli_real_escape_string($con, $_POST['id_number']);
    }
    if (isset($_POST['passport_number'])) {
        $passport_number = mysqli_real_escape_string($con, $_POST['passport_number']);
    }
    if (isset($_POST['current_status_of_officials'])) {
        $current_status_of_officials = mysqli_real_escape_string($con, $_POST['current_status_of_officials']);
    }

    // Handle file uploads
    if (isset($_FILES['id_front_image']) && $_FILES['id_front_image']['error'] === 0) {
        $id_front_image = 'uploads/' . uniqid() . '-' . $_FILES['id_front_image']['name'];
        move_uploaded_file($_FILES['id_front_image']['tmp_name'], $id_front_image);
    }

    if (isset($_FILES['id_back_image']) && $_FILES['id_back_image']['error'] === 0) {
        $id_back_image = 'uploads/' . uniqid() . '-' . $_FILES['id_back_image']['name'];
        move_uploaded_file($_FILES['id_back_image']['tmp_name'], $id_back_image);
    }

    if (isset($_FILES['passport_image']) && $_FILES['passport_image']['error'] === 0) {
        $passport_image = 'uploads/' . uniqid() . '-' . $_FILES['passport_image']['name'];
        move_uploaded_file($_FILES['passport_image']['tmp_name'], $passport_image);
    }

    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === 0) {
        $profile_photo = 'uploads/' . uniqid() . '-' . $_FILES['profile_photo']['name'];
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo);
    }

    // Insert data into the database
    $sql = "INSERT INTO users (full_name, name_with_initials, date_of_birth, schools_attend, highest_education_qualification, current_occupation, previous_occupation, qualified_year_as_national_rj, home_address, contact_number, whatsapp_number, email, id_number, passport_number, current_status_of_officials, id_front_image, id_back_image, passport_image, profile_photo) VALUES ('$full_name', '$name_with_initials', '$date_of_birth', '$schools_attend', '$highest_education_qualification', '$current_occupation', '$previous_occupation', '$qualified_year_as_national_rj', '$home_address', '$contact_number', '$whatsapp_number', '$email', '$id_number', '$passport_number', '$current_status_of_officials', '$id_front_image', '$id_back_image', '$passport_image', '$profile_photo')";

    if (mysqli_query($con, $sql)) {
        echo "Registration successful!";
        // You can redirect to another page here
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <?php
    if ($registration_successful) {
        echo "Registration successful!";
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <!-- Add your form fields here -->
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name"><br>

        <label for="name_with_initials">Name with Initials:</label>
        <input type="text" name="name_with_initials"><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth"><br>

        <label for="schools_attend">Schools Attend:</label>
        <input type="text" name="schools_attend"><br>

        <label for="highest_education_qualification">Highest Education Qualification:</label>
        <input type="text" name="highest_education_qualification"><br>

        <label for="current_occupation">Current Occupation:</label>
        <input type="text" name="current_occupation"><br>

        <label for="previous_occupation">Previous Occupation:</label>
        <input type="text" name="previous_occupation"><br>

        <label for="qualified_year_as_national_rj">Qualified Year as National RJ:</label>
        <input type="number" name="qualified_year_as_national_rj"><br>

        <label for="home_address">Home Address:</label>
        <textarea name="home_address"></textarea><br>

        <label for="contact_number">Contact Number:</label>
        <input type="tel" name="contact_number"><br>

        <label for="whatsapp_number">WhatsApp Number:</label>
        <input type="tel" name="whatsapp_number"><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br>

        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number"><br>

        <label for="passport_number">Passport Number:</label>
        <input type="text" name="passport_number"><br>

        <label for="current_status_of_officials">Current Status of Officials:</label>
        <input type="text" name="current_status_of_officials"><br>

        <!-- File Upload Fields -->
        <label for="id_front_image">ID Front Image:</label>
        <input type="file" name="id_front_image" accept="image/*"><br>

        <label for="id_back_image">ID Back Image:</label>
        <input type="file" name="id_back_image" accept="image/*"><br>

        <label for="passport_image">Passport Image:</label>
        <input type="file" name="passport_image" accept="image/*"><br>

        <label for="profile_photo">Profile Photo:</label>
        <input type="file" name="profile_photo" accept="image/*"><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
