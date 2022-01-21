<?php
    $mysqli = new mysqli($_ENV["SEED_MYSQL_HOST"], $_ENV["SEED_MYSQL_USER"], $_ENV["SEED_MYSQL_PASSWORD"], $_ENV["SEED_MYSQL_DATABASE"]);

    if($mysqli->connect_errno) {
        exit();
    }
?>
