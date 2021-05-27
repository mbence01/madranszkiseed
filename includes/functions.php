<?php
    $mysqli = new mysqli("127.0.0.1", "seed", "Bence2001!09%06", "madranszkiseed");

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
