<?php

if(empty($_POST["name"])){
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if(!preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if(!preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}



$mysqli = require __DIR__ ."/connection.php";

$sql = "INSERT INTO user(name, email, password)
        VALUES (?, ?, ?)";


$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL error:". $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $_POST["password"]);

if(!$stmt->execute()){
    if(strpos($mysqli->error, "Duplicate entry") !== false){
        die("Email already taken");
    }
}


header("Location: login.php");
exit;
