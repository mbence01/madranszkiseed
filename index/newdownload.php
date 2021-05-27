<?php
    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: ../manage_login/login.php");

?>

<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/main.css" />
		<link rel="stylesheet" href="../css/downloads.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/uploadfile.js"></script>

        <link rel="icon" href="../img/main/icons/download.png" />

        <title>Start new download</title>
    </head>
    <body>
		<div class="container-fluid">
			<!-- Desktop -->
			<div class="hidden-xs">
				<div class="top-menu row">
					<div class="col-xs-3">
						<p id="top-menu-logo">
							<img src="../img/torrent.png" width="25%" align="absmiddle" alt="Logo"> madranszkiSeeds
						</p>
					</div>
					<div class="col-xs-9 main-top">
						<p class="download-title">Start a new download</p>
						<hr />			
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 menu">
						<nav>
							<a href="../index.php" class="main-menu-a">
								<img src="../img/main/icons/home.png" class="main-menu-ico">
								<span>   Main page</span>
							</a>
							<a href="statistics.php" class="main-menu-a">
								<img src="../img/main/icons/statistics.png" class="main-menu-ico">
								<span>   Statistics</span>
							</a>
							<a href="mydownloads.php" class="main-menu-a">
								<img src="../img/main/icons/list.png" class="main-menu-ico">
								<span>   My downloads</span>
							</a>
							<a href="newdownload.php" class="main-menu-a selected">
								<img src="../img/main/icons/download.png" class="main-menu-ico">
								<span>   New download</span>
							</a>
							<a href="profile.php" class="main-menu-a">
								<img src="../img/main/icons/profile.png" class="main-menu-ico">
								<span>   My profile</span>
							</a>
							<a href="../manage_login/logout.php" class="main-menu-a">
								<img src="../img/main/icons/logout.png" class="main-menu-ico">
								<span>   Log out</span>
							</a>
						</nav>
					</div>
					<div class="col-xs-9 main-div">
						<form action="addnewdownload.php" method="POST" enctype="multipart/form-data">
							<input type="text" name="torrentname" placeholder="Human readable torrent name (Note: You cannot use '_' character!)" maxlength="50" /><br>
							<label for="file">Select torrent file</label>
							<input id="file" style="display: none;" type="file" name="torrentfile" /><br>
							<input type="submit" value="Start download" /></td>
						</form>
					</div>
				</div>
			</div>
			
			<!-- Mobile -->
			<div class="visible-xs">
			sddsdasdsa
			</div>
		</div>
    </body>
</html>