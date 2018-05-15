<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="UTF-8">
		<title>MAZE UF</title>
		<link rel="stylesheet" type="text/css" href="../maze-css.css">
		<link rel="stylesheet" type="text/css" href="lanCSS.css">
		<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Orbitron" rel="stylesheet">
	</head>

	<body>
		<header>
			<img id="logga" src="MaZe-UF-logga-vit.png" alt="logga">
		</header>
		<div class="ram">
		<?php
			include("../templates/meny.php");
		?>

<div class="formular">


<h1>Boka ett lan</h1>

<form action="action_page.php">
<fieldset>
<legend>Vi ska ha ett lan!</legend>
LAN Namn: 
<input type="text" name="lan_name"><br>

Plats: 
<input type="text" name="lan_place"><br>

Address: 
<input type="text" name="lan_address"><br>

Börjar: 
<input type="date" name="lan_start_date"><br>

Slutar:
<input type="date" name="lan_end_date"><br>
</fieldset>
</form>

</div>
</div>

		<footer>
			<p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p>
		</footer>

	</body>
</html>
