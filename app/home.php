<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background"></div>

    <?php
        session_start();

         spl_autoload_register(function ($class_name) {
            include 'Classes/' . $class_name . '.php';
        });

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $logIn = new logIn();
        $logIn->selectUser($username, $password);



                
        

        $logIn = new logIn();

        if ($logIn->getSession()) {
            echo "Logged in";
            echo '<h1 class="accInfo-Text">Username: ' . $_SESSION['username'] . '</h1>';
            echo '<h1 class="accInfo-Text">Password: ' . $_SESSION['password'] . '</h1>';
        } else {
            echo "<h1 class='accInfo-Text'>Not logged in</h1>";

        }

    ?>

</body>
</html>