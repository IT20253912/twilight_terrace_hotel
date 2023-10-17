<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Login form</title>
   </head>
   <body>
      <div class="login">
         <img src="assets/img/bg.jpg" alt="image" class="login__bg">

         <form action="authenticate.php" method="post" class="login__form">
            <h1 class="login__title">Admin Login</h1>

            <div class="login__inputs">
               <div class="login__box">
                  <input type="text" name="username" id="username" placeholder="Email ID" required class="login__input">
                  <i class="ri-mail-fill"></i>
               </div>

               <div class="login__box">
                  <input type="password" name="password" id="password" placeholder="Password" required class="login__input">
                  <i class="ri-lock-2-fill"></i>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-box">
                  <input type="checkbox" class="login__check-input" id="user-check">
                  <label for="user-check" class="login__check-label">Remember me</label>
               </div>

              
            </div>

            <button type="submit" class="login__button" value="Login">Login</button>

            <div class="login__register">
               Don't have an account? <a href="#">Register</a>
            </div>
         </form>
      </div>
   </body>
</html>