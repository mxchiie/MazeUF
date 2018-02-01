<?php

session_start();

if(!isset($_SESSION['loggedIn'])){
	$_SESSION['loggedIn'] = false;
}

if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	$_SESSION['loggedIn'] = false;
}
if( isset($_POST['lan'])){
	
	$dbc = mysqli_connect("localhost","root","","lan");
	
	// Hämta data
	$name = htmlspecialchars($_POST['name']);
	$place = htmlspecialchars($_POST['place']);
	$address = htmlspecialchars($_POST['address']);
	$s_date = htmlspecialchars($_POST['s_date']);
	$s_time = htmlspecialchars($_POST['s_time']);
	$e_date = htmlspecialchars($_POST['e_date']);
	$e_time = htmlspecialchars($_POST['e_time']);
	
	$start = $s_date . " " . $s_time; 
	$end = $e_date . " " . $e_time; 

	// Formulera fråga
	$query = "INSERT INTO lans (lan_name,lan_place,lan_address,lan_start_date,lan_end_date) VALUES ('$name','$place','$address','$start','$end')";

	// Kolla om frågan fungerar
	if(mysqli_query($dbc,$query)){
		echo "LAN registrerat!";
	}
	else{
		echo "Något gick fel...";
	}
	
}
else if( isset($_POST['table'])){
	// användare vill logga in
	
	$dbc = mysqli_connect("localhost","root","","lan");
	
	// Hämta data
	$lan_id = htmlspecialchars($_POST['lan_id']);
	$chairs = htmlspecialchars($_POST['chairs']);
	$price = htmlspecialchars($_POST['price']);
	
	// Formulera fråga
	$query = "INSERT INTO tables (table_lan_id,table_price) VALUES ($lan_id,$price)";
	
	// Ställ frågan
	$result = mysqli_query($dbc,$query);

	// Formulera fråga
	$query = "SELECT MAX(table_id) FROM tables";
			
	// Ställ frågan
	$result = mysqli_query($dbc,$query);

	$table_id = mysqli_fetch_array($result)[0];
	
	for($i=0 ; $i < $chairs ; $i++){
		
		// Formulera fråga
		$query = "INSERT INTO chairs (chair_table_id) VALUES ($table_id)";
	
		// Ställ frågan
		$result = mysqli_query($dbc,$query);
		
	}
	

}

?>
<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="UTF-8">
		<title>MAZE UF</title>
		<link rel="stylesheet" type="text/css" href="maze-css.css">
		<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Orbitron" rel="stylesheet">
	</head>

	<body>
		<header>
			<img id="logga" src="MaZe-UF-logga-vit.png" alt="logga">
		</header>
		<div class="ram">
		<?php
			include("templates/meny.php");
		?>
		
		Skapa LAN:
	<form action = "admin.php" method = "POST">
		
		Namn:<input type = "text" name = "name" required> </input><br>
		Plats:<input type = "text" name = "place" required> </input><br>
		Adress:<input type = "text" name = "address" required> </input><br>
		Start:<input type = "date" name = "s_date" required> </input><br>
		Start tid:<input type = "text" name = "s_time" required> </input><br>
		Slut:<input type = "date" name = "e_date" required> </input><br>
		Slut tid:<input type = "text" name = "e_time" required> </input><br>

		<input type="submit" name="lan" value = "Skapa LAN" />

	</form>
	
	<br><br><br>
	
	Skapa bord:
	<form action = "admin.php" method = "POST">
		
		LAN:<select name = "lan_id"  required> 
		<?php
		$dbc = mysqli_connect("localhost","root","","lan");
	
		$query = "SELECT * FROM lans";
		
		// Ställ frågan
		$result = mysqli_query($dbc,$query);
		

		while($row = mysqli_fetch_array($result)){
			?>
			
					<option value="<?php echo $row['lan_id'];?>"><?php echo $row['lan_name'];?></option>

			<?php
			
		}
			
		
		?>
		
		</select><br>
		Antal stolar:<input type = "number" name = "chairs" min="0" required> </input><br>
		Pris:<input type = "number" name = "price" min = "50" required> </input><br>

		<input type="submit" name="table" value = "Skapa bord" />

	</form>
		
		</div>	

		<footer> 
			<p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p> 
		</footer>

	</body>
</html>


