<?php
    $MYSQL_HOST     = getenv("SEED_MYSQL_HOST");
    $MYSQL_USER     = getenv("SEED_MYSQL_USER");
    $MYSQL_PASS     = getenv("SEED_MYSQL_PASS");
    $MYSQL_DATABASE = getenv("SEED_MYSQL_DATABASE");

    $mysqli = new mysqli($MYSQL_HOST, $MYSQL_USER, "mB!2001!09!06", $MYSQL_DATABASE);

    date_default_timezone_set("Europe/Budapest");

    function goBack() {
        echo "<script>window.location.href=history.back();</script>";
    }

    function alert($text) {
        echo "<script>alert('".$text."');</script>";
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
?>
