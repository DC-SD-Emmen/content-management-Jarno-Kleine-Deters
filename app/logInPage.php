<?php

$host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
$dbname = "database";
$charset = "utf8";
$port = "3306";
?>

<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="background"></div>

    <form id="LogInForm" action="home.php" method="post">

        <h1 class="title">Log In</h1>

        <br>

        <label id="username" for="username">Username:</label>
        <input id="user" type="text" name="username" id="username" required>

        <br>
        <br>

        <label id="password" for="password">Password:</label>
        <input id="pass" type="password" name="password" id="password" required>

        <br>
        <br>

        <input id="submit" type="submit" value="Sign In">

        <br>

        <p id="account">Don't have an account? Sign up <a href="index.php">here</a></p>

    </form>


</body>
</html>