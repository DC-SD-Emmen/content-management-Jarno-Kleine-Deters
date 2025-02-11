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

    <form id="LogInForm" method="post">

        <h1>Log In</h1>

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

        <p>Don't have and account? Sign up <a href="index.php">here</a></p>

    </form>

    <?php
        // require 'userManager.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port", 'root', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("SELECT * FROM user_login WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "Username exists in the database.";
                } else {
                    echo "Username does not exist in the database.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    ?>

</body>
</html>