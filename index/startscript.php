<?php
    require_once("../includes/functions.php");
    session_start();

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: manage_login/login.php");

    $USER =     $_SESSION["id"];
    $TORRENT =  $_GET["id"];
    $TYPE =     "";
    $TITLE =    "";
    $HASH =     "";

    $output = "";
    exec("python3 ../python/torrent.py -g 1 -v " . $_GET["id"], $output);

    $HASH = getTorrentHash($TORRENT);

    foreach($output as $line) {
        if(str_contains($line, "FILETYPE"))
            $TYPE = "/sambashare/" . explode(" ", $line, 2)[1];
        if(str_contains($line, "TORRENTNAME"))
            $TITLE = explode(" ", $line, 2)[1];
    }

    $query = $mysqli->prepare("INSERT INTO downloads(userid, name, filename, hash, path, date, finishdate, status) VALUES(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL, 0)");
    $query->bind_param("dssss", $USER, $TITLE, $TORRENT, $HASH, $TYPE);
    $query->execute();

    $randPort = rand(41413, 51413);

    shell_exec("screen -d -m transmission-cli -w " . $TYPE . " -p " . $randPort . " -f '/torrentfinished.sh' " . $TORRENT . ".torrent");

    $query->close();

    header("Location: ../index.php?page=downloads");

    function getTorrentHash($torrent) {
        $torrent_hash = "";
        exec("transmission-show " . $torrent . ".torrent", $torrent_hash);

        foreach($torrent_hash as $line) {
            if(str_contains($line, "Hash:")) {
                return explode(" ", trim($line))[1];
            }
        }
    }
?>