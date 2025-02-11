<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
         spl_autoload_register(function ($class_name) {
            include 'Classes/' . $class_name . '.php';
        });

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $logIn = new logIn();
        $logIn->selectUser($username, $password);



        
        $session = $logIn->getSession();

        if ($session) {
            echo "Logged in";
        }else{
            echo "Not logged in";
        }
    ?>

    <h1 class="accInfo-Text">Username</h1>
    <h1 class="accInfo-Text">Password</h1>
</body>
</html>