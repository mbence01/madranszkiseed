<?php
    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: manage_login/login.php");

?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/main.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/main-quote.js"></script>

        <link rel="icon" href="img/torrent.png" />

        <title>Main page</title>
    </head>
    <body>
		<div class="container-fluid">
			<!-- Desktop -->
			<div class="hidden-xs">
				<div class="top-menu row">
					<div class="col-xs-3">
						<p id="top-menu-logo">
							<img src="img/torrent.png" width="25%" align="absmiddle" alt="Logo"> madranszkiSeeds
						</p>
					</div>
					<div class="col-xs-9 main-top">
						<p id="quote-title">Daily joke:</p>
						<span id="random-quote"><!-- Random quote --></span>			
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 menu">
						<nav>
							<a href="index.php" class="main-menu-a">
								<img src="img/main/icons/home.png" class="main-menu-ico">
								<span>   Main page</span>
							</a>
							<a href="index/statistics.php" class="main-menu-a">
								<img src="img/main/icons/statistics.png" class="main-menu-ico">
								<span>   Statistics</span>
							</a>
							<a href="index/mydownloads.php" class="main-menu-a">
								<img src="img/main/icons/list.png" class="main-menu-ico">
								<span>   My downloads</span>
							</a>
							<a href="index/newdownload.php" class="main-menu-a">
								<img src="img/main/icons/download.png" class="main-menu-ico">
								<span>   New download</span>
							</a>
							<a href="index/profile.php" class="main-menu-a">
								<img src="img/main/icons/profile.png" class="main-menu-ico">
								<span>   My profile</span>
							</a>
							<a href="manage_login/logout.php" class="main-menu-a">
								<img src="img/main/icons/logout.png" class="main-menu-ico">
								<span>   Log out</span>
							</a>
						</nav>
					</div>
					<div class="col-xs-9 main-div">
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