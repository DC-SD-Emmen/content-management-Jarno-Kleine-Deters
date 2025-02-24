<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        header("Location: home.php");
        exit();
    }

    ob_start();


    $host = "mysql"; // Le host est le nom du service, présent dans le docker-compose.yml
    $dbname = "database";
    $charset = "utf8";
    $port = "3306";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="background"></div>

    <form id="LogInForm" action="logInPage.php" method="post">

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

    <?php
        spl_autoload_register(function ($class_name) {
            include 'Classes/' . $class_name . '.php';
        });

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new logIn();
            $user->selectUser($username, $password);

            if ($user->getSession()) {
                $_SESSION['username'] = $username;
                header("Location: home.php");


                ob_end_flush();


                exit();
            } else {
                echo "Invalid username or password.";
            }
        }
    ?>

</body>
</html>