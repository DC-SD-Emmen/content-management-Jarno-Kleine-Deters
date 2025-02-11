<?php

$host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
$dbname = "database";
$charset = "utf8";
$port = "3306";
?>

<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form id="LogInForm" method="post">

        <h1>Sign Up</h1>

        <br>

        <label for="username">Username:</label>
        <input id="user" type="text" name="username" id="username" required>

        <br>
        <br>

        <label for="password">Password:</label>
        <input id="pass" type="password" name="password" id="password" required>
    
        <br>
        <br>

        <input id="submit" type="submit" value="Sign In">

        <br>

        <p>Already have and account? Log in <a href="logIn.php">here</a></p>
        
    </form>

    <?php
        require 'userManager.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new signUp();
            $user->insertUser($username, $password);

            echo "User registered successfully!";
        }
    ?>

</body>
</html>