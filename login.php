<?php
session_start();

$lockout_period = 10 * 60; 
$max_attempts = 3;

if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}
if (!isset($_SESSION['last_failed_attempt'])) {
    $_SESSION['last_failed_attempt'] = 0;
}

$is_locked_out = false;

function check_login_credentials($email, $password) {
    
    $valid_email = 'test@example.com';
    $valid_password = 'password';

    return $email === $valid_email && $password === $valid_password;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_SESSION['failed_attempts'] >= $max_attempts && time() - $_SESSION['last_failed_attempt'] <= $lockout_period) {
        $is_locked_out = true;
    } else {
        if (check_login_credentials($email, $password)) {
            $_SESSION['failed_attempts'] = 0;
        } else {
            $_SESSION['failed_attempts']++;
            $_SESSION['last_failed_attempt'] = time();
        }
    }
}


$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/connection.php";

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if ($_POST["password"] === $user["password"]) {
            
            session_start();

            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Login</title>
</head>

    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        form {
            background-color: rgb(10, 236, 236);
            border-radius: 5px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: white;
            margin: 0 0 20px;
        }
        label {
            color: white;
            display: block;
            margin-bottom: 5px;
        }
        input {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        button {
            background-color: red;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
        }
        a {
            color: white;
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }

        em{
            color: white;
            margin: 0 0 20px;
        }

        .g-recaptcha {
            display: flex;
            justify-content: center;
            padding: 10px;
        }

    </style>
</head>



<body>
    <form method="post" action="">
        <h1>Login</h1>
        
        <?php if ($is_locked_out): ?>
            <em>Your account is locked. Please try again in 10 minutes.</em>
        <?php elseif ($is_invalid): ?>
            <em>login failed</em>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <div class="g-recaptcha" data-sitekey="6Lf0WC8lAAAAABMZ3mWznwyDn5bmdE2z0nMvkJeC"></div>
        <button type="submit">Log in</button>
        
        <p><a href="signup.html">signup</a></p>
    </form>
</body>

</html>
