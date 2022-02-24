<?php
    require_once("../includes/functions.php");
    session_start();

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: manage_login/login.php");

    $USER =     $_SESSION["id"];
    $TORRENT =  $_GET["id"];
    $TYPE =     "";
    $TITLE =    "";
    $HASH =     "";
    $OUTPUT =   !getenv("SEED_OUTPUT_DIR") ? "/sambashare/" : getenv("SEED_OUTPUT_DIR");
    $TORRENT_DIR = "../torrents/";

    getTorrentData($_GET["id"], $OUTPUT, $TYPE, $TITLE);

    $HASH = getTorrentHash($TORRENT_DIR . $TORRENT);

    $query = $mysqli->prepare("INSERT INTO downloads(userid, name, filename, hash, path, date, finishdate, status) VALUES(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL, 0)");
    $query->bind_param("dssss", $USER, $TITLE, $TORRENT, $HASH, $TYPE);
    $query->execute();

    $randPort = rand(41413, 51413);

    shell_exec("screen -d -m transmission-cli -w " . $TYPE . " -p " . $randPort . " -f '/torrentfinished.sh' " . $TORRENT_DIR . $TORRENT . ".torrent");

    $query->close();

    header("Location: ../index.php?page=downloads");
?>