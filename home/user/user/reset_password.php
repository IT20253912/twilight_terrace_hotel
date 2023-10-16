<?php
session_start();
require 'db.php'; 
if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $current_time = date('Y-m-d H:i:s');
    $stmt = $con->prepare("SELECT user_id FROM password_reset_tokens WHERE token = ? AND expiration > ?");
    $stmt->bind_param("ss", $token, $current_time);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo "Invalid or expired token.";
    } else {
        $user_id = $result->fetch_assoc()["user_id"];
?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
      <link rel="stylesheet" href="assets/css/styles.css">
      <title>Reset Password</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/forgot-bg.jpg" alt="image" class="login__bg">
         <form method="post" action="update_password.php" class="login__form">
            <h1 class="login__title">Reset Password</h1>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="login__inputs">
               <div class="login__box">
                  <input type="password" name="password" required placeholder="New Password" class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>
            </div>
            <button type="submit" class="login__button">Reset Password</button>
         </form>
      </div>
   </body>
</html>

<?php
    }
}
?>
