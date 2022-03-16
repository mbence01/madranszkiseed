<?php

$torrentTypes = array(
    "xvid_hun",     "Film SD/HU",
    "xvid",         "Film SD/EN",
    "dvd_hun",      "Film DVDR/HU",
    "dvd",          "Film DVDR/EN",
    "dvd9_hun",     "Film DVD9/HU",
    "dvd9",         "Film DVD9/EN",
    "hd_hun",       "Film HD/HU",
    "hd",           "Film HD/EN",
    "xvidser_hun",  "Sorozat SD/HU",
    "xvidser",      "Sorozat SD/EN",
    "dvdser_hun",   "Sorozat DVDR/HU",
    "dvdser",       "Sorozat DVDR/EN",
    "hdser_hun",    "Sorozat HD/HU",
    "hdser",        "Sorozat HD/EN",
    "mp3_hun",      "MP3/HU",
    "mp3",          "MP3/EN",
    "lossless_hun", "Lossless/HU",
    "lossless",     "Lossless/EN",
    "clip",         "Klip",
    "game_iso",     "Játék PC/ISO",
    "game_rip",     "Játék PC/RIP",
    "console",      "Konzol",
    "ebook_hun",    "eBook/HU",
    "ebook",        "eBook/EN",
    "iso",          "APP/ISO",
    "misc",         "APP/RIP",
    "mobil",        "APP/Mobil",
    "xxx_xvid",     "XXX SD",
    "xxx_dvd",      "XXX DVDR/DVD9",
    "xxx_imageset", "XXX Imageset",
    "xxx_hd",       "XXX HD"
)

?>

<link rel="stylesheet" href="css/upload-search.css" />

<div class="row">
    <div class="col-xs-12 main-div" style="height: 1000%;">
        <form action="index.php" method="GET">
            <input type="hidden" name="page" value="search">
            <input type="text" name="torrentname" placeholder="Type a title" maxlength="50" /><br>

            <select name="type">
                <?php

                for($i = 0; $i < count($torrentTypes); $i++) {
                    echo "<option value='" . $torrentTypes[$i++] . "'>" . $torrentTypes[$i] . "</option>";
                }

                ?>
            </select>

            <input type="submit" value="Search on nCore" /></td>
        </form>

        <div id="results-container">
            <?php
            if(isset($_GET["torrentname"]) AND isset($_GET["type"])) {
                echo "<h1>Results:</h1>";

                $value = $_GET["torrentname"] . "|" . $_GET["type"];
                $output = shell_exec("python3 python/torrent.py -l 1 -v \"" . $value . "\" 2>&1");

                if(str_contains($output, "Exception"))
                    echo "<pre style='color: red;'>" . $output . "</pre>";
                else
                    include_once("python/result.html");
            }
            ?>
        </div>
    </div>
</div>