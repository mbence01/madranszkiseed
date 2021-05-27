<?php
    session_start();

    $_SESSION["focused"] = md5($_POST["focused"]);
?>
