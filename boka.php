<html>


<head>

	<link rel="stylesheet" href="css.css" />
	<title> Maze UF</title>

	
	
	
</head>



<body>

<div id="seatmap">
<br><br>

<?php

session_start();

$dbc = mysqli_connect("localhost","root","","lan");


if(isset($_GET['chair_id'])){
	
	$chair_id = $_GET['chair_id'];
	
	$query = "INSERT INTO bookings (booking_customer) VALUES (1)";
	$result = mysqli_query($dbc,$query);

	
	$query = "SELECT * FROM bookings ORDER BY booking_id DESC";
	$result = mysqli_query($dbc,$query);
	$booking_id = mysqli_fetch_array($result)['booking_id'];

	
	$query = "INSERT INTO booking_info (booking_id,chair_id) VALUES ($booking_id,$chair_id)";
	$result = mysqli_query($dbc,$query);
	
	$query = "UPDATE chairs SET chair_status = 'BOOKED' WHERE chair_id = $chair_id";
	$result = mysqli_query($dbc,$query);
	
}


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
		<a href = "boka.php?chair_id=<?php echo $chair_row['chair_id'];?>"><div  class="chair <?php if($chair_row['chair_status'] == "BOOKED"){echo "taken";} ?> id="chair<?php echo $chair_row['chair_id'];?>"></div></a>
		<?php
		
	}
	?>
	<div style="clear:left;height:50px;"></div>
	<?php
	
}

?>


</div>



</body>



</html>