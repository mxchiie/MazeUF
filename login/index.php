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
if( isset($_POST['date']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
	// användare vill registrera sig
	
	$dbc = mysqli_connect("localhost","root","","lan");
	
	// Hämta data
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$name = htmlspecialchars($_POST['name']);
	$date = htmlspecialchars($_POST['date']);
	
	// Formulera fråga
	$query = "INSERT INTO users (user_nickname,user_mail,user_real_name,user_birthdate,user_password) VALUES ('$username','$email','$name','$date','$password')";

	// Kolla om frågan fungerar
	if(mysqli_query($dbc,$query)){
		echo "Du är nu registrerad! Logga in nedan:<br>";
	}
	else{
		echo "Något gick fel...";
	}
	
}
else if( isset($_POST['mail']) && isset($_POST['password'])){
	// användare vill logga in
	
	$dbc = mysqli_connect("localhost","root","","lan");
	
	// Hämta data
	$mail = htmlspecialchars($_POST['mail']);
	$password = htmlspecialchars($_POST['password']);
	
	// Formulera fråga
	$query = "SELECT * FROM users WHERE user_mail = '$mail' AND user_password = '$password'";
	
	// Ställ frågan
	$result = mysqli_query($dbc,$query);
	
	// Finns en rad med resultat så har användaren skrivit rätt information
	if($row = mysqli_fetch_array($result)){
		//echo "Du är nu inloggad!";
		$_SESSION['loggedIn'] = true;
		$_SESSION['user_nickname'] = $row['user_nickname'];
		$_SESSION['user_id'] = $row['user_id'];
		header("Location: /mazeuf/");
	}
	else{
		echo "Fel uppgifter, försök igen...";
		$_SESSION['loggedIn'] = false;
	}

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

if(!$_SESSION['loggedIn']){ // Om man inte är inloggad, visa formulär

?>
	
	Registreringsformulär:
	<form action = "index.php" method = "POST">
		
		Mail:<input type = "email" name = "email" > </input><br>
		Fullständigt namn:<input type = "text" name = "name" > </input><br>
		Nickname:<input type = "text" name = "username" > </input><br>
		Födelsedatum:<input type = "date" name = "date" max="2003-12-31" min="1958-01-01"> </input><br>
		Lösenord:<input type = "password" name = "password" > </input><br>

		<input type="submit" value = "Registrera" />

	</form>
	
	<br><br><br>
	
	Loginformulär:
	<form action = "index.php" method = "POST">
		
		Mail:<input type = "mail" name = "mail" > </input><br>
		Lösenord:<input type = "password" name = "password" > </input><br>

		<input type="submit" value = "Logga in" />

	</form>
	
<?php
}
else{ // Om man redan är inloggad, visa den riktiga sidan
echo "Välkommen till Maze UF " . $_SESSION['user_nickname'] . "!";
	?>
	<br>
	<a href = "boka.php"> Boka plats </a> <br>
	
	<form action = "index.php" method = "POST">
	
		<input type="submit" name="logout" value = "Logga ut" />

	</form>
	
	<?php
}
?>
	

</body>

</html>