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
?>

<!DOCTYPE html>
<html>

<head>
	<title> Min sida </title>
	<link rel="stylesheet" href="css.css">
</head>


<body>

<?php 

if(!$_SESSION['loggedIn']){ // Om man inte är inloggad
	header("Location: /mazeuf/login/");
}
else{ // Om man redan är inloggad, visa den riktiga sidan
echo "Välkommen till Maze UF " . $_SESSION['user_nickname'] . "!";
	?>
	<br>
	<a href = "boka.php"> Boka plats </a> <br>
	<a href = "admin.php"> Adminpanel </a> <br>
	
	<form action = "index.php" method = "POST">
	
		<input type="submit" name="logout" value = "Logga ut" />

	</form>
	
	<?php
}
?>
	

</body>

</html>