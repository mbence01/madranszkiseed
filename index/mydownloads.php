<?php
    error_reporting(E_ALL);
    session_start();
	require_once("../includes/functions.php");

    if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == md5(false)) header("location: ../manage_login/login.php");

?>

<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/main.css" />
		<link rel="stylesheet" href="../css/upload-search.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>

        <link rel="icon" href="../img/main/icons/list.png" />

        <title>My downloads</title>
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
						<p class="download-title">Last 10 downloads from your account</p>
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
							<a href="mydownloads.php" class="main-menu-a selected">
								<img src="../img/main/icons/list.png" class="main-menu-ico">
								<span>   My downloads</span>
							</a>
							<a href="upload.php" class="main-menu-a">
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
						echo "		<th>Torrent name</th>";
						echo "		<th>Torrent filename</th>";
						echo "		<th>Download date</th>";
						echo "		<th>Status</th>";
						echo "	</tr>";
					
						$c = 0;
						while($rows = $get_user_downloads->fetch_array(MYSQLI_ASSOC)) {
							echo "<tr class='".(++$c%2 == 0 ? "dwn-tr-fst" : "dwn-tr-sec")."'>";
							
							// Name
							echo "<td>".$rows["name"]."</td>";
							
							// Torrent file name
							if(strlen($rows["torrentname"]) > 50) echo "<td title='".$rows["torrentname"]."'>".substr($rows["torrentname"], 0, 50)."...</td>";
							else echo "<td>".$rows["torrentname"]."</td>";
							
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
			</div>
			
			<!-- Mobile -->
			<div class="visible-xs">
			sddsdasdsa
			</div>
		</div>
    </body>
</html>