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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
 


    <div class="contact">
        <div class="contact-form">
          <h2 class="contact-heading">Contact Us</h2>
      <form action="" method="post" id="contact">
      
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" data-validate-field="name" required>
      
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" data-validate-field="email" required>
      
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" data-validate-field="subject" required>
      
        <label for="message">Message:</label>
        <textarea id="message" name="message" data-validate-field="message" required></textarea>
      
        <button type="submit">Send Message</button>
      </form>
      
        </div>
      </div>


<script>
$(document).ready(function () {
  $("#contact").validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      subject: {
        required: true,
      },
      message: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Name is required",
      },
      email: {
        required: "Email is required",
        email: "Email is not valid",
      },
      subject: {
        required: "Subject is required",
      },
      message: {
        required: "Message is required",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});

</script>


<?php

$mysqli = require __DIR__ ."/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  
  $stmt = $mysqli->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");


  $stmt->bind_param("ssss", $name, $email, $subject, $message);


  if ($stmt->execute()) {
    echo "Message sent successfully.";
  } else {
    echo "Error sending message.";
  }


  $stmt->close();
}

?>


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




