<?php
	include("db.php");
	$reserved = array();
		$query = "SELECT reservation_stadium,DATE(reservation_date),HOUR(reservation_date) FROM stadium_reservations WHERE status<>'Canceled' OR status IS NULL";
		$result=mysqli_query($con,$query) or die ("query 1 incorrect.....");
		while($row = mysqli_fetch_array($result)){
			$reserved[$row[0]][$row[1]][]=$row[2];
		}
	echo json_encode($reserved, JSON_PRETTY_PRINT);
?>