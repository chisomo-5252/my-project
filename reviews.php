<?php
session_start();

$mysqli = require __DIR__ . "/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $review = $_POST['review'];

    $stmt = $mysqli->prepare("INSERT INTO review (username, review) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $review);
    $stmt->execute();
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

    <div class="reviews">
        <div class="reviews-form">
            <h1 class="reviews-heading">Leave a Review</h1>
            <form id="review-form" method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="" >
    
                <label for="review">Review:</label>
                <textarea id="review" name="review" rows="4" required></textarea>
    
                <button type="submit">Submit Review</button>
            </form>
    
                <div id="reviews">
                    <h2>Reviews</h2>
                    <?php
                    $stmt = $mysqli->prepare("SELECT username, review FROM review");
                    $stmt->execute();
                    $stmt->bind_result($username, $review);
                    while ($stmt->fetch()) {
                        echo "<div class='review'>";
                        echo "<h3 class='review-username'>$username</h3>";
                        echo "<p class='review-content'>$review</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
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
                