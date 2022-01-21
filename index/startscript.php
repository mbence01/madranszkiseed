<?php
    session_start();

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: manage_login/login.php");

    shell_exec("python3 ../python/torrent.py -g 1 -u " . $_SESSION["id"] . " -v " . $_GET["id"] . " > /dev/null 2>&1 &");
    header("Location: ../index.php");
?>