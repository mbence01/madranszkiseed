<?php
    session_start();

    $_SESSION["logged"] = null;
    $_SESSION["id"] = null;
    header("location: login.php");
?>