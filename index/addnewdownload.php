<?php
	session_start();
	require_once("../includes/functions.php");

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: ../manage_login/login.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["torrentname"]) AND strlen($_POST["torrentname"]) > 0 AND strlen($_POST["torrentname"]) <= 50 AND strpos($_POST["torrentname"], "_") === false) {
			if(strlen($_FILES["torrentfile"]["name"]) != 0) {
                $_POST["torrentname"] = str_replace(" ", "_", $_POST["torrentname"]);
				$fname = "../torrents/" . $_SESSION["id"] . "_" . $_POST["torrentname"] . ".torrent";
			
				if(strtolower(pathinfo($fname, PATHINFO_EXTENSION)) === "torrent") {
					if(!file_exists($fname)) {
						if(move_uploaded_file($_FILES["torrentfile"]["tmp_name"], $fname)) {
							$HASH = getTorrentHash($fname);
                            $PATH = !getenv("SEED_OUTPUT_DIR") ? "/sambashare/other/Torrents" : (getenv("SEED_OUTPUT_DIR") . getenv("SEED_OTHER_DIR"));

							$query = $mysqli->prepare("INSERT INTO downloads(userid, name, filename, hash, path, date, finishdate, status)
																   VALUES(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, NULL, 0);");
                            $query->bind_param("dssss", $_SESSION["id"], $_POST["torrentname"], $fname, $HASH, $PATH);

                            if($query->execute() !== false) {
								$query->close();

                                $randPort = rand(41413, 51413);

                                shell_exec("screen -d -m transmission-cli -w " . $PATH . " -p " . $randPort . " -f '/torrentfinished.sh' " . $fname);
                                header("Location: ../index.php?page=downloads");
                            } else {
                                $query->close();

                                alert("An error has occurred during data save.");
                                goBack();
                            }
						} else {
							alert("An error has occurred during file upload. Try it later!");
							goBack();
						}
					} else {
						alert("This torrent name (" . $_POST["torrentname"] . ") is already in use! Choose another one!");
						goBack();
					}
				} else {
					alert("You only can upload files with .torrent extension!");
					goBack();
				}
			} else {
				alert("You must upload at least one .torrent file!");
				goBack();
			}
		} else {
			alert("The torrent name must be between 0 and 50 characters and can not contain _ character!");
			goBack();
		}
	} else {
		http_response_code(404);
		require_once("404.html");
	}

?>