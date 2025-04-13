<?php

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/connection.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Wild Swimming and Camping</title>
    <script src="https://kit.fontawesome.com/4b3f714c0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php if (isset($user)): ?>




    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><form action="">
                <input type="text" name="search" placeholder="searching.....">
                <button type="submit">search</button>
            </form></li>
            <li><a href= "information.php">information</a></li>
            <li><a href="availability.php">availability</a></li>
            <li><a href="reviews.php">reviews</a></li>
            <li><a href="features.php">features</a></li>
            <li><a href="localattraction.php">local attraction</a></li>
            <li><a href="aboutus.php">about us</a></li>
            <li><a href="contactus.php">contact us</a></li>
            </ul>

            <a href="login.php" class="logout">Log out</a>
    
            
        </ul>  
    </nav>
    
    <div class="home">
        <div class="slideshow">
            <div class="slide">
                <img src="image/image (1).jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image/image (10).jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image/image (2).jpg" alt="Image 3">
            </div>
            <div class="slide">
                <img src="image/image (3).jpg" alt="Image 4">
            </div>
            <div class="slide">
                <img src="image/image (5).jpg" alt="Image 5">
            </div>
            </div>
            
        </div>
    <div class="heading">
        <h1> Welcome to Global Wild Swimming and Camping</h1>
    </div>



    <script>
         let slideIndex = 0;
    const slides = document.getElementsByClassName("slide");

    function changeSlide() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.opacity = 0;
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.opacity = 1;
        setTimeout(changeSlide, 5000);
    }
    changeSlide();
    </script>


<?php else: ?>

<a href="login.php"> Login.</a>

<?php endif; ?>


<footer>
    <div class="footerz">
      <div class="row">
        <div class="center">
          <p>&copy; 2023 Global Wild Swimming and Camping. All rights reserved.</p>
        </div>
        <div class="social-media">
          <ul>
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
                