<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: logInPage.php");
        exit();
    }

    echo "<p id='loggedInAs'>Logged in as " . htmlspecialchars($_SESSION['username']) . "</p>";

    spl_autoload_register(function ($class_name) {
        include 'Classes/' . $class_name . '.php';
    });


    $fetchGames = new fetchGames();
    $games = $fetchGames->getGamesByUser($_SESSION['username']);
?>

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
    <h1 class="accInfo-Text">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <a id="logOut" href="logout.php">Log out</a>
    
    <h2>Your Games</h2>
    <ul>
        <?php foreach ($games as $game): ?>
            <li><?php echo htmlspecialchars($game['title']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>