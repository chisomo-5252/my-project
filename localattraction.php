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
 

    <div id="map-container"></div>
  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlK2Grvc8QUdmiDF6FzXj9MrE2cngxZas
    &libraries=places&callback=initMap"></script>
    
    <script>
       
        function initMap() {
          
            var center = { lat: -13.9626, lng: 33.7741 };
    
       
            var map = new google.maps.Map(document.getElementById('map-container'), {
                zoom: 13,
                center: center
            });
    
          
            var request = {
                location: center,
                radius: '5000',
                types: ['tourist_attraction']
            };
    
         
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        createMarker(results[i], map);
                    }
                }
            });
        }
    
       
        function createMarker(place, map) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location,
                title: place.name
            });
    
      
            var infowindow = new google.maps.InfoWindow({
                content: '<h3>' + place.name + '</h3><p>' + place.vicinity + '</p>'
            });
    
            marker.addListener('click', function() {
                infowindow.open(map, marker);
                showPlaceDetails(place);
            });
        }
    


    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlK2Grvc8QUdmiDF6FzXj9MrE2cngxZas&libraries=places&callback=initMap">
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
                