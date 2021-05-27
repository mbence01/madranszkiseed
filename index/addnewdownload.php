<?php
	session_start();
	require_once("../includes/functions.php");

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: ../manage_login/login.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["torrentname"]) AND strlen($_POST["torrentname"]) > 0 AND strlen($_POST["torrentname"]) <= 50 AND strpos($_POST["torrentname"], "_") === false) {
			if(strlen($_FILES["torrentfile"]["name"]) != 0) {
				$fname = "../torrents/" . $_SESSION["id"] . "_" . $_POST["torrentname"] . ".torrent";
				$fname_from_root = "torrents/" . $_SESSION["id"] . "_" . $_POST["torrentname"] . ".torrent";
			
				if(strtolower(pathinfo($fname, PATHINFO_EXTENSION)) === "torrent") {
					if(!file_exists($fname)) {
						if(move_uploaded_file($_FILES["torrentfile"]["tmp_name"], $fname)) {
							$torrent_name = $_SESSION["id"] . "_" . $_POST["torrentname"];
							
							$insert_torrent_data = $mysqli->query("INSERT INTO
																	downloads(id, userid, name, torrentname, date, finishdate, status)
																   VALUES(
																		0,
																		".$_SESSION["id"].",
																		'".$_POST["torrentname"]."',
																		'".$fname_from_root."',
																		CURRENT_TIMESTAMP,
																		CURRENT_TIMESTAMP,
																		0);");
							if($insert_torrent_data !== false) {
								$output = shell_exec("./torrent.sh " . $torrent_name . " /sambashare/madranszkiSeeds/torrents/" . $torrent_name . ".torrent");
								alert("./torrent.sh " . $torrent_name . " /sambashare/madranszkiSeeds/torrents/" . $torrent_name . ".torrent");
								alert("Torrent has successfully been uploaded. Download will start soon...");
								redirect("mydownloads.php");
							} else {
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