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
	.lan_container{
		margin-left:200px;
		width:300px;
		background-color:pink;
		border: 2px solid black;
		height:150px;
		margin-bottom:10px;
	}
	
	.lan_container:hover{
		cursor:pointer;
		background-color:lightpink;
	}
	
	.lan_name{
		text-align:center;
		font-size:25px;
		margin:0px;
	}
	
	.lan_at{
		text-align:center;
		font-size:13x;
		margin:0px;
	}
	
	.lan_place{
		text-align:center;
		font-size:20px;
		margin:0px;	
	}
	
	.lan_address, .lan_date{
		text-align:center;
		font-size:15px;
		margin:10px;	
	}
	
	.var{
		color:red;
	}
	
	</style>
	
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
		
		if(isset($_GET['lanid'])){
			
		}
		else{

			$query = "SELECT * FROM lans";
			$result = mysqli_query($dbc,$query);
			
			while($row = mysqli_fetch_array($result)){
				?>
				
				<a href="?lanid=<?php echo $row['lan_id']; ?>"><div class="lan_container">
				
					<p class="lan_name">NTI LAN</p>
					<p class="lan_at">PÅ</p>
					<p class="lan_place">NTI Gymnasiet Göteborg</p>
					<p class="lan_address"><span class="var">VAR? </span> Kronhusgatan 9</p>
					<p class="lan_date"><span class="var">NÄR? </span> 9/11 - 12/11</p>
				
				</div></a>
				
				<?php
				
			}
		
		}
		
		?>

		<footer>
			<p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p>
		</footer>

	</body>
</html>
