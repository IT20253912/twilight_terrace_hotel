<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
      <link rel="stylesheet" href="assets/css/styles.css">
      <title>Forgot Password</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/forgot-bg.jpg" alt="image" class="login__bg">
         <form method="post" action="send_reset_email.php" class="login__form">
            <h1 class="login__title">Forgot Password</h1>
            <div class="login__inputs">
               <div class="login__box">
                  <input type="email" placeholder="Enter your Email" name="email" required class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>
            </div>
            <button type="submit" class="login__button">Send Reset Email</button>
            <div class="login__register">
               Back to Login <a href="index.php">Login</a>
            </div>
         </form>
      </div>
   </body>
</html>
