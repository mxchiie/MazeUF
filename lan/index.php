<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="UTF-8">
		<title>MAZE UF</title>
		<link rel="stylesheet" type="text/css" href="../maze-css.css">
		<link rel="stylesheet" type="text/css" href="lanCSS.css">
		<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Orbitron" rel="stylesheet">
	</head>

	<style>
	
	a{
		text-decoration:none;
	}
	
	.lan_link{
		
		color: lightpink;
		font-size: x-large;
		font-family:Orbitron;
		text-decoration: none;
	}
	
	.lan_content{
		margin-top:100px;
	}
	
	</style>
	
	<body>
		<header>
			<img id="logga" src="../MaZe-UF-logga-vit.png" alt="logga">
		</header>
		<div class="ram">
		<?php
			include("../templates/meny.php");
		?>

		<div class="lan_content">
		<a href = "lan.php"> <p class="lan_link">Välj LAN</p></a>

		<a href = "bokning.php"> <p class="lan_link">Boka LAN</p></a>

		<?php
		
		session_start();
		
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] < 10){
			?>
			<a href = "admin.php"> <p class="lan_link">ADMIN</p></a>
			<?php
		}
		?>


</div>

		<footer>
			<p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p>
		</footer>

	</body>
</html>
