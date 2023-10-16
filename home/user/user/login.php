<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user exists
    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $username, $hashed_password);
            if ($stmt->fetch()) {
                if (password_verify($password, $hashed_password)) {
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION["username"] = $username;
                    header("location: ../../index.php");
                    // header("location: availability_form.php");
                } else {
                    echo "Incorrect password.";
                }
            }
        } else {
            echo "User not found.";
        }
        $stmt->close();
    }
}
?>




<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Login form - Bedimcode</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/userbackloglow.jpg" alt="image" class="login__bg">

         <form action="" class="login__form" method="post">
            <h1 class="login__title">User Login</h1>

            <div class="login__inputs">
               <div class="login__box">
                  <input type="email" placeholder="Email ID" required class="login__input" type="email" name="email" required>
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" placeholder="Password" required class="login__input" name="password" required>
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check">
              
            </div>

            <button type="submit" class="login__button" value="Login">Login</button>

            <div class="login__register">
               Don't have an account? <a href="registration.php">Register</a>
            </div>
            <div class="login__register">
    <a href="forgot_password.php">Forgot your password?</a>
</div>
         </form>
      </div>
   </body>
</html>
