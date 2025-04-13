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

       

        
    </ul>  
</nav>
 

    <section class="information">
 
       
        <section class="pitch">
        <li><a href="availability.php">searching</a></li>
        <p>This page allows the customers to search the online 
          database for availability and needs to include tent pitch, touring caravan pitch and 
          motorhome pitch</p>
        </section>
        
      
        <section class="features">
        <li><a href="features.php">Features</a></li>
        <p>This page will list the features that are available on the site – e.g., leisure 
          facilities such as entertainment – or amenities on site such as car parking, showers, 
          internet access, etc. as well as nearby amenities and rules. </p>
        </section>
        
   
        <section class="local-attractions">
        <li><a href="localattraction.php">Local Attractions</a></li>
        <p>This page provides the details of the local attractions that are 
          available near to the site such as tourist attractions or walks.
          </p>
        </section>
        
       
        <section class="guest-reviews">
        <li><a href="reviews.php">Reviews</a></li>
        <p>This page provides copies of reviews that visitors have posted about the 
          different sites.</p>
        </section>
        
        
        <section class="contact-us">
        <li><a href="contactus.php">Contact Us</a></li>
        <p>This is a contact form where customers can send messages through the 
          website.
          </p>
        </section>

        <div class="rss-feed">
          <h1>RSS FEED</h1>
  <?php
    
    $rss_feed_url = "http://feeds.bbci.co.uk/news/rss.xml";

  
    $rss_feed = simplexml_load_file($rss_feed_url);

 
    foreach ($rss_feed->channel->item as $item) {
      
      echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
    }
  ?>
</div>



</section>



</script>




    
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
                