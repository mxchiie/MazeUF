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

		
		<?php
		$dbc = mysqli_connect("localhost","root","","lan");

		
		if(isset($_POST['nyhet'])){
			$text = $_POST['text'];
				
			// SKAPA EN TABELL FÖR NYHETER
			$query = "INSERT INTO news ............ VALUES(....,'$text')";
			
			mysqli_query($dbc,$query);

		}
		
		
		
		?>
		
		
		
		
		<form method="POST" action="">
		Välj LAN:<select type="text" name="lan_name">
			<?php
			$dbc = mysqli_connect("localhost","root","","lan");
				
				$query = "SELECT * FROM lans";
				$result = mysqli_query($dbc,$query);
				
				while($row = mysqli_fetch_array($result)){
					$name = $row['lan_name'];
					$id = $row['lan_id'];
					echo "<option value='$id'>$name</option>";
				}
				?>
			</select><br>
		Text till nyhet: <input type="text" name="text" /><br>
		<input type="submit" name="nyhet" />
		</form>
		
		
<div class="formular">


<h1>Boka ett lan</h1>


<form action="admin.php">
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

<input type="submit" value="Skapa LAN" name="lan">

</fieldset>
</form>
<br><br><br>
<form action="admin.php">
<fieldset>
<legend>Skapa bord!</legend>
LAN Namn: 



<select type="text" name="lan_name">
<?php
	
	$query = "SELECT * FROM lans";
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['lan_name'];
		$id = $row['lan_id'];
		echo "<option value='$id'>$name</option>";
	}
	?>
</select><br>

Pris per stol: 
<input type="text" name="lan_place"><br>


<input type="submit" value="Skapa bord" name="table">

</fieldset>
</form>


</div>
</div>

		<footer>
			<p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p>
		</footer>

	</body>
</html>
