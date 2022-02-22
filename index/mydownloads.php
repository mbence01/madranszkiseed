<?php
    error_reporting(E_ALL);
    session_start();
	require_once("includes/functions.php");
?>

<link rel="stylesheet" href="css/upload-search.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<link rel="icon" href="img/main/icons/list.png" />

<div class="row">
    <div class="col-xs-12 main-div">
    <?php

    $get_user_downloads = $mysqli->query("	SELECT * FROM 
                                                downloads 
                                            WHERE 
                                                userid = ".$_SESSION["id"]." 
                                            ORDER BY id DESC 
                                            LIMIT 10");

    if($get_user_downloads->num_rows == 0) {
        echo "<p class='error'>You have not downloaded any torrents yet!</p>";
    } else {
        echo "<table class='download-table'>";

        echo "	<tr>";
        echo "		<th>Torrent filename</th>";
        echo "		<th>Path</th>";
        echo "		<th>Download date</th>";
        echo "		<th>Status</th>";
        echo "	</tr>";

        $c = 0;
        while($rows = $get_user_downloads->fetch_array(MYSQLI_ASSOC)) {
            echo "<tr class='".(++$c%2 == 0 ? "dwn-tr-fst" : "dwn-tr-sec")."'>";

            // Torrent file name
            if(strlen($rows["name"]) > 30) echo "<td title='".$rows["name"]."'>".substr($rows["name"], 0, 30)."...</td>";
            else echo "<td>".$rows["name"]."</td>";

            // Path
            echo "<td>" . $rows["path"] . "</td>";

            // Date
            echo "<td>".$rows["date"]."</td>";

            // Status
            echo "<td>".($rows["status"] == 0 ? "Downloading" : "Seeding<br>(Downloaded at ".$rows["finishdate"].")")."</td>";

            echo "</tr>";
        }

        echo "</table>";
    }

    ?>
    </div>
</div>