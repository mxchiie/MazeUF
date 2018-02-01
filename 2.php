<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<title>MAZE UF</title>
<link rel="stylesheet" type="text/css" href="maze-css.css">
<link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Orbitron" rel="stylesheet">
<header>
	<img id="logga" src="MaZe-UF-logga-vit.png" alt="logga">
  </header>
</head>
<body>
<div class="ram">
<div id="header">
<div>


<ul class="meny">
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" onclick="myFunction()">Meny</a>
    <div class="dropdown-content" id="myDropdown">
      <a href="maze.html">Hem</a>
	  <a href="1.html">LAN</a>  
      <a href="2.html">Boka Här</a>
      <a href="3.html">Personal</a>

    </div>
  </li>
</ul>
</div>
</div>
<h1>BOKA HÄR</h1>
<div class="boka">
<p>Här kan ni förboka platser inför LAN:et.</p>
<div id="seatmap">
<?php

$dbc = mysqli_connect("localhost","root","","lan");


$query = "SELECT * FROM tables";

$result = mysqli_query($dbc,$query);

while($table_row = mysqli_fetch_array($result)){

	$table_id = $table_row['table_id'];

	$query2 = "SELECT * FROM chairs WHERE chair_table_id = $table_id";

	$result2 = mysqli_query($dbc,$query2);

	$number_of_chairs = mysqli_num_rows($result2)+2;
	
	
	
	$chair_no = 0;
	while($chair_row = mysqli_fetch_array($result2)){
		$chair_no+=1;
		if($chair_no == floor($number_of_chairs/2)){
			?>
				<div class="table" style="width:<?php echo $number_of_chairs*6; ?>px"></div>

	<?php
		}
		?>
		<a href = "book.php?chair_id=<?php echo $chair_row['chair_id'];?>"><div  class="chair <?php if($chair_row['chair_status'] == "BOOKED"){echo "taken";} ?> id="chair<?php echo $chair_row['chair_id'];?>"></div></a>
		<?php
		
	}
	?>
	<div style="clear:left;height:50px;"></div>
	<?php
	
}

?>
</div>
</div>
</div>


<script>

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>
<footer> <p> © Copyright - MAZE UF  <a href="mailto:ufmaze@gmail.com"> [Maila MAZE UF]  </a> </p> </footer>
</html>