<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: logInPage.php");
    exit();
?>