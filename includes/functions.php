<?php
    $MYSQL_HOST     = getenv("SEED_MYSQL_HOST");
    $MYSQL_USER     = getenv("SEED_MYSQL_USER");
    $MYSQL_PASS     = getenv("SEED_MYSQL_PASSWORD");
    $MYSQL_DATABASE = getenv("SEED_MYSQL_DATABASE");

    $mysqli = new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DATABASE);

    date_default_timezone_set("Europe/Budapest");

    function goBack() {
        echo "<script>window.location.href=history.back();</script>";
    }

    function alert($text) {
        echo "<script type='text/javascript'>alert('".$text."');</script>";
    }

    function addBox($color, $text) {
        echo "<script>
            $(document).ready(function(){
                $('#aside').append('<div class=`aside-box-' + color + '`><img class=`close-aside-box` src=`../img/close.png` width=`20`>' + text + '</div>');    
            });
        </script>";
    }

    function redirect($href) {
        echo "<script>window.location.href = '".$href."';</script>";
    }

    function getDay() {
        return date("Y.m.d");
    }

    function getTorrentData($id, $output_dir, &$TYPE, &$TITLE) {
        $output = "";
        exec("python3 ../python/torrent.py -g 1 -v " . $id, $output);

        foreach($output as $line) {
            if(str_contains($line, "FILETYPE"))
                $TYPE = $output_dir . explode(" ", $line, 2)[1];
            if(str_contains($line, "TORRENTNAME"))
                $TITLE = explode(" ", $line, 2)[1];
        }
    }

    function getTorrentHash($torrent) {
        $torrent_hash = "";
        exec("transmission-show \"" . $torrent . "\"", $torrent_hash);

        foreach($torrent_hash as $line) {
            if(str_contains($line, "Hash:")) {
                return explode(" ", trim($line))[1];
            }
        }
    }
?>
