<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
  header("location: ./user/user/index.php"); // Redirect to the login page if not logged in
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>twilight_terrace_hotel</title>
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>
<body id="top">
<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'twilight_hotel';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$select_sql = "SELECT * FROM packages";
$result = mysqli_query($con, $select_sql);
?>

<main>
    <article>
        <section class="package" id="package">
            <div class="container">
                <p class="section-subtitle">Popular Packages</p>
                <h2 class="h2 section-title">Check Out Our Packages</h2>
                <p class="section-text">
                    Discover Unforgettable Stays with Our Exclusive Hotel Packages Today!
                </p>
                <ul class="package-list">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li>';
                        echo '<div class="package-card">';
                        echo '<figure class="card-banner">';
                        echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['package_name'] . '" loading="lazy">';
                        echo '</figure>';
                        echo '<div class="card-content">';
                        echo '<h3 class="h3 card-title">' . $row['package_name'] . '</h3>';
                        echo '<p class="card-text">' . $row['description'] . '</p>';
                        echo '<ul class="card-meta-list">';
                        echo '<li class="card-meta-item">';
                        echo '<div class="meta-box">';
                        echo '<ion-icon name="time"></ion-icon>';
                        echo '<p class="text">' . $row['count'] . '</p>';
                        echo '</div>';
                        echo '</li>';
                        echo '<li class="card-meta-item">';
                        echo '<div class="meta-box">';
                        echo '<ion-icon name="people"></ion-icon>';
                        echo '<p class="text">pax: ' . $row['count'] . '</p>';
                        echo '</div>';
                        echo '</li>';
                        echo '<li class="card-meta-item">';
                        echo '<div class="meta-box">';
                        echo '<ion-icon name="location"></ion-icon>';
                        echo '<p class="text">' . $row['location'] . '</p>';
                        echo '</div>';
                        echo '</li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '<div class="card-price">';
                        echo '<div class="wrapper">';
                        echo '<p class="reviews">(25 reviews)</p>';
                        echo '<div class="card-rating">';
                        echo '<ion-icon name="star"></ion-icon>';
                        echo '<ion-icon name="star"></ion-icon>';
                        echo '<ion-icon name="star"></ion-icon>';
                        echo '<ion-icon name="star"></ion-icon>';
                        echo '<ion-icon name="star"></ion-icon>';
                        echo '</div>';
                        echo '</div>';
                        echo '<p class="price">';
                        echo '$' . $row['price'];
                        echo '<span>/ per person</span>';
                        echo '</p>';
                        echo '<button class="btn btn-secondary">
                        <a href="../hotelreservationform/hotel.php?email=<?php echo $email; ?>">Book Now</a>
                    </button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </section>
    </article>
</main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" alt="Tourly logo">
          </a>

          <p class="footer-text">
            Urna ratione ante harum provident, eleifend, vulputate molestiae proin fringilla, praesentium magna conubia
            at
            perferendis, pretium, aenean aut ultrices.
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+01123456790" class="contact-link">+01 (123) 4567 90</a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:info.tourly.com" class="contact-link">info.tourly.com</a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address>3146 Koontz, California</address>
            </li>

          </ul>

        </div>

        <div class="footer-form">

          <p class="form-text">
            Subscribe our newsletter for more update & news !!
          </p>

          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>

            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 <a href="">codewithsadee</a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>