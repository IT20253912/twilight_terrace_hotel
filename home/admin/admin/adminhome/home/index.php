
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basl</title>

  <!-- 
    - favicon
  -->


  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- 
    - preload images
  -->
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header">
    <div class="header-bottom skewBg" data-header>
      <div class="container">

        <a href="#" class="logo">TTH</a>

        <nav class="navbar" data-navbar>
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="../../homemnge/managehomepage.php" class="navbar-link skewBg" data-nav-link>Home Manage</a>
            </li>

            <li class="navbar-item">
              <a href="#live" class="navbar-link skewBg" data-nav-link>Live</a>
            </li>

            <li class="navbar-item">
              <a href="#features" class="navbar-link skewBg" data-nav-link>Features</a>
            </li>

            <li class="navbar-item">
              <a href="#blog" class="navbar-link skewBg" data-nav-link></a>
            </li>

          </ul>
        </nav>

        <div class="header-actions">
          <button class="search-btn" aria-label="open search" data-search-toggler>
            <ion-icon name="search-outline"></ion-icon>
          </button>

          <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" class="menu"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
          </button>

        </div>

      </div>
    </div>

  </header>


 

  <div class="search-container" data-search-box>

    <div class="input-wrapper">
      <input type="search" name="search" aria-label="search" placeholder="Search here..." class="search-field">

      <button class="search-submit" aria-label="submit search" data-search-toggler>
        <ion-icon name="search-outline"></ion-icon>
      </button>

      <button class="search-close" aria-label="close search" data-search-toggler></button>
    </div>

  </div>


  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="home"
        style="background-image: url('./assets/icons/bg.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Welcome to</p>

            <h1 class="h1 hero-title">
              Admin<span class="span">&nbsp;&nbsp;Panel</span>
            </h1>

            <p class="hero-text">
            "Your dream getaway is just a click away. Book with ease and stay with peace."
            </p>

            <a href="index.php">
            <button class="btn skewBg">Control Panel</button>
            </a>
            <!-- <button class="btn skewBg">Register</button> -->

          </div>

          <!-- <figure class="hero-banner img-holder" style="--width: 700; --height: 700;">
            <img src="./assets/icons/newhomelogo.png" width="700" height="700" alt="hero banner" class="w-100">
          </figure> -->

        </div>
      </section>

      <!-- 
        - #BRAND
      -->

      <section class="section brand" aria-label="brand">
        <div class="container">

          <ul class="has-scrollbar">

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-64 (3).png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-60.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-64 (2).png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-64 (1).png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-68.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="./assets/icons/icons8-boxing-64.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

          </ul>

        </div>
      </section>





      <div class="section-wrapper">

        <!-- 
          - #LATEST GAME
        -->

        <section class="section latest-game" aria-label="latest game">
          <div class="container">

            <p class="section-subtitle">Latest Updates</p>

            <h2 class="h2 section-title">
            Management<span class="span"> &nbsp;&nbsp;Components</span>
            </h2>

            <ul class="has-scrollbar">

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="./assets/icons/smallbg.jpg" width="400" height="470" loading="lazy"
                      alt="White Walker Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="../../viewusers/view.php" class="card-badge skewBg">Open Panel</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">User<span class="span">&nbsp;&nbsp;Manegement</span></a>
                    </h3>

                    <!-- <p class="card-price">
                      Form Submission Deadline : <span class="span">Data</span>
                    </p> -->

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="./assets/icons/smallbg.jpg" width="400" height="470" loading="lazy"
                      alt="Hunter Killer II" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="../../can/availability.php" class="card-badge skewBg">Open Panel</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">Reservation<span class="span">&nbsp;&nbsp;Management</span></a>
                    </h3>

                    <!-- <p class="card-price">
                      Entry Fee : <span class="span">$25.00</span>
                    </p> -->

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="./assets/icons/smallbg.jpg" width="400" height="470" loading="lazy"
                      alt="Cyberpunk Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="../../../../packages/manage_packages.php" class="card-badge skewBg">Open panel</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">Package<span class="span"> &nbsp;Management</span></a>
                    </h3>

                    <!-- <p class="card-price">
                      Entry Fee : <span class="span">$25.00</span>
                    </p> -->

                  </div>

                </div>
              </li>

            </ul>

          </div>
        </section>

      </div>

    </article>
  </main>

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>