<?php 
	$con = mysqli_connect("fdb22.awardspace.net","3190764_restaurantdb","cordon@123","3190764_restaurantdb");

	if (mysqli_connect_errno()){
		echo "failed to connect " , mysqli_connect_errno();
	}
?>