
<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/connection.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mysqli = require __DIR__ . "/connection.php";

    if (isset($_POST['location'])) {
        $location = $_POST['location'];
    } else {
        $location = '';
    }

    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = '';
    }

    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    } else {
        $date = '';
    }

    $sql = '';
    if ($type == "tent") {
        $sql = "SELECT available FROM pitche WHERE location = ? AND type = 'Tent Pitch' AND date = ?";
    } else if ($type == "touring caravan") {
        $sql = "SELECT available FROM pitche WHERE location = ? AND type = 'Touring Caravan Pitch' AND date = ?";
    } else if ($type == "motorhome") {
        $sql = "SELECT available FROM pitche WHERE location = ? AND type = 'Motorhome Pitch' AND date = ?";
    }

    // execute query
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $location, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    
}


?>

     
<?php 
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row !== null && array_key_exists('available', $row)) {
        echo "<p>Number of pitches available: " . $row["available"] . "</p>";
    } else {
        echo "<p>Error: Unable to retrieve pitch availability.</p>";
    }
} else {
    echo "<p>No pitches available</p>";
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

	<header class="site-header">
		<h1>Pitch Types and Availability</h1>
	</header>

        <main class="content-container">
            <h2>Search for Availability</h2>
            <form method="POST">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location">
                <br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
                <br>
                <label for="type">Type:</label>
                <select id="type" name="type">
                    <option value="tent">Tent Pitch</option>
                    <option value="touring caravan">Touring Caravan Pitch</option>
                    <option value="motorhome">Motorhome Pitch</option>
                </select>
                <br>
                <input type="submit" value="Search">
            </form>
            <section>
                <h2>Touring Caravan Pitch </h2>
                <p>Location: Likuni</p>
                <p>Number of pitches available: 5</p>
                <p>Price: MKW 50,000/night</p>
            </section>
		<section class="pitch-section">
			<h2>Tent Pitch </h2>
			<p>Location: Chinsapo</p>
			<p>Number of pitches available: 10</p>
			<p>Price: MKW 20,000/night</p>
		</section>
		
		<section>
			<h2>Motorhome Pitch </h2>
			<p>Location: Area 9</p>
			<p>Number of pitches available: 3</p>
			<p>Price: MKW 80,000/night</p>
		</section>
	    </main>
      
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
                