

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="multi.css">
</head>
<body>
	<div class="viewdata-table" id="viewdata-form" align="center">
		<div class="view_table">
					<div class="table-respnsive">
					<table class="table table-striped table-hover">
						<tr class="success">
							<th>Ingredients</th>					
							<th>Quantity</th>
							<th>Unit</th>
						</tr>
						<?php
                                              
						
						$output = NULL; 
						$server     = "fdb22.awardspace.net";
						$username   = "3190764_restaurantdb";
						$password   = "cordon@123";													//Database connection
						$database   = "3190764_restaurantdb";
					$con = mysqli_connect($server, $username, $password, $database);
				if(!$con){
					die("Error : " . $con->connect_error);
				}
                              
				$sql = "select ingredients,qty,unit from inventory_details where email='$email'";		//Query execution
				$result = $con->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result-> fetch_assoc()) {
						echo "<tr><td>" . $row['ingredients'] . "</td><td>" . $row['qty'] . "</td><td>" . $row['unit'] .  "</td></tr>" ;	//Display result in table format
					}																														
					echo "</table>";
				}else {
					$output = "Inventory current unavailable. Please try again.";
					echo $output;
				}	


				$con->close(); 
				?>
		</table>
	</div>
		</div>
	</div>
	
</body>
</html>

				

<?php
/*
$con = mysqli_connect("localhost:3306", "root", "", "restaurantdb");
if($con->connect_error) {
  exit('Could not connect');
}

$sql = "select ingredients,qty,unit from inventory_details";

$result = $con->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result-> fetch_assoc()) {
						echo "<div class='table-respnsive'>";
						echo "<table class='table table-striped table-hover'>";
						echo "<tr class='success'>";
						echo   "<th>Ingredients</th> <th>Quantity</th> <th>Unit</th>";
						echo  "</tr>";
						echo "<tr><td>" . $row['ingredients'] . "</td><td>" . $row['qty'] . "</td><td>" . $row['unit'] .  "</td></tr>" ;	//Display result in table format
					}																														
					echo "</table>";
					echo "</div>";
					echo "</div>";
				
				}else {
					$output = "Inventory current unavailable. Please try again.";
					echo $output;
				}	
*/
?>