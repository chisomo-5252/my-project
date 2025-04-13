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
 


    <div class="page-container">
        <div class="features">
          <h2 class="section-heading">Features</h2>
          <ul class="list">
            <li class="list-item">Leisure facilities</li>
            <li class="list-item">Sports facilities</li>
            <li class="list-item">Dining options</li>
          </ul>
        </div>
        
        <div class="amenities">
          <h2 class="section-heading">Nearby Amenities</h2>
          <ul class="list">
            <li class="list-item">Tourist attractions</li>
            <li class="list-item">Shopping centers</li>
            <li class="list-item">Banks and ATMs</li>
            <h2 class="section-heading">Rules</h2>
            <li class="list-item">No smoking</li>
            <li class="list-item">No pets allowed</li>
            <li class="list-item">Parking regulations</li>
            
          </ul>
        </div>
        
        <div class="wearable-tech">
          <h2 class="section-heading">Wearable Technology</h2>
          <ul class="list">
            <li class="list-item">Fitness trackers</li>
            <li class="list-item">Smartwatches</li>
          </ul>
        </div>
      </div>



    

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
                