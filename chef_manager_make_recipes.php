<?php 
	//connect to database
session_start();
	if ($_SESSION["email"]==true) 
	{
		//echo $_SESSION["email"];
		//$disp = $_SESSION["email"];
    	//echo "<p>$disp</p>";
	}
	else
	{
		header("Location:index.php");
	}
$server     = "fdb22.awardspace.net";
$username   = "3190764_restaurantdb";
$password   = "cordon@123";
$database   = "3190764_restaurantdb";
date_default_timezone_set('Asia/Kolkata');
$date = date("Y/m/d");
$time = date("h:i:s a");
//$recipe_name = $_POST['recipe_name'];
$email = $_SESSION['email']; //SESSION VARIABLE
$con = mysqli_connect($server, $username, $password, $database);
if(!$con){
	die("Error : " . $con->connect_error);
}


$query2 = "select distinct name from recipe_details where email='$email'";
$result2 = $con->query($query2);

?>

<html>
<head>
	<title>View Recipes</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- AJAX FILE --> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap 4 library -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- Latest Bootstrap 4 CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- CSS FILE -->
	<link rel="stylesheet" type="text/css" href="multi.css">
	<style type="text/css">

		body{
			animation: fade-in 1s;
			background-image: url("chef3.jpg");
			background-color: grey;
			background-size: cover;
			overflow-x: hidden;
		}

	}	
	.hero{
		background-image: url("chef3.jpg");
		background-color: grey;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: absolute;
		width: 100%;
		height: 100%;
		overflow: hidden;


	}

	@keyframes fade-in {

		0%{
			background-image: url("chef33.jpg"); opacity: 0;
		}
		33%{
			background-image: url("chef33.jpg"); opacity: 0.25;
		}
		67%{
			background-image: url("chef3.jpg"); opacity: 0.5;
		}
		100%{
			background-image: url("chef3.jpg"); opacity: 1;
		}

	}
</style>

</head>
<body>
	<div class="hero">
		<!-- HEADER -->
		<div class="header">
			<nav class="navbar navbar-expand-sm navbar-dark sticky-top">

				<a href="chef_manager.php"><span id="navbar-brand-title" class="navbar-brand">Cordon Bleu</span></a>

				<button class="navbar-toggler btn-dark" data-toggle="collapse" data-target="#navbar-Menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-Menu">
					<ul class="navbar-nav">
					
						<li class="nav-item">
							<a href="chef_manager.php" class="nav-link">Chef Manager</a>
						</li>

						<li class="nav-item">
							<a href="aboutus_chef.php" class="nav-link">About us</a>
						</li>

						<li class="nav-item">
							<a href="contactus_chef.php" class="nav-link">Contact us</a>
						</li>
						<li class="nav-item">
							<a href="logout.php" class="nav-link">Logout</a>
						</li>
					</ul>
					
					<ul class="navbar-nav ml-auto">
            			<li class="nav-item">
                			<p class="nav-link" data-target="#myModal" data-toggle="modal" style="color:white;" style="mix-blend-mode: difference;"><i class="fa fa-user-circle-o"></i><?php echo $_SESSION["email"]; ?></p>
            			</li>
        			</ul>
				</div>			
			</nav>
		</div>
		<!-- VIEW DATA -->
		<div class="title" align="center">
			<h1>Recipe details</h1><br>
		</div>
		

		<div>
			<form method="POST">
		<div class="inv_manager_update_inventory-inputs">
			<select  class="form-control" name="recipe_name" required>
								<option hidden>Select recipe name</option>
								<?php while($row = mysqli_fetch_array($result2)):; ?>
									<option><?php echo $row[0];?></option>
								<?php endwhile;?>
							</select><br>
		<div class="submit-inputs">
			<div class="row">
				<div class="col">
					<div id="submit" align="center">
		<input type="submit" name="viewdata" id="viewdata" value="Cook Now" class="btn btn-success">	
					</div>
				</div>
				<div class="col">
					<div id="submit" align="center">
		<input type="submit" name="viewlogs" id="viewdata" value="View Logs" class="btn btn-info">	
					</div>
				</div>			
			</div>
	
	
</div><br>
		</div>	
				<div class="viewdata-table">
					
								<?php
											//ADD LOGS
						$output = NULL; 
							
							if (isset($_POST['recipe_name'])) {
								$recipe_name = $_POST["recipe_name"];
								$server     = "fdb22.awardspace.net";
								$username   = "3190764_restaurantdb";
								$password   = "cordon@123";													//Database connection
								$database   = "3190764_restaurantdb";
				$email = $_SESSION['email'];
				$con = mysqli_connect($server, $username, $password, $database);
				if(!$con){
					die("Error : " . $con->connect_error);
				}
								$query1 = "insert into makerecipe_details(email,recipe_name,date,time) values ('$email','$recipe_name','$date','$time')";
								$log_record = $con->query($query1);
								if(!$log_record){
									echo $con->error;
								}
								$con->close();
							}
						
							//VIEW Logs
				if(isset($_POST['viewlogs'])){
							$server     = "fdb22.awardspace.net";
							$username   = "3190764_restaurantdb";
							$password   = "cordon@123";													//Database connection
							$database   = "3190764_restaurantdb";
				$email = $_SESSION['email'];
				$con = mysqli_connect($server, $username, $password, $database);
				if(!$con){
					die("Error : " . $con->connect_error);
				}
				//$name = $_POST["name1"];
				$query = "select recipe_name,date,time from makerecipe_details where email='$email'";			//Query execution
				$result = $con->query($query);
				if ($result->num_rows > 0) {
					echo '<div class="view_table">
						<div class="table-respnsive">
							<table class="table table-striped table-hover">
								<tr class="success">
									<th>Dish preparation logs</th>
									<th></th>
									<th></th>
								</tr>
								<tr class="success">
									<th>Recipe name</th>					
									<th>Date</th>
									<th>Time</th>
								</tr>';
					while ($row = $result-> fetch_assoc()) {
						echo "<tr><td>" . $row['recipe_name'] . "</td><td>" . $row['date'] . "</td><td>" . $row['time'] .  "</td></tr>" ;	//Display result in table format
					}																														
					echo "</table>";
				}else {
					$output = "Please select a valid option and try again.";
					echo $output;
				}	
				$con->close(); 
			}
			
	?>
			</table>
		</div>
	</div>

</div>

</form>
<div class="submit-inputs" id="chef_manager_view_recipes_submit" align="center">
	<a href="chef_manager.php" ><input type="submit" name="updatedata" class="form-control btn btn-info" value="Chef Manager"></a>	
</div>
</div>
<br><br><br>
<!-- FOOTER -->
<div align="center">
	<div class="foot">
		<a href="https://www.facebook.com/" class=" fa fa-facebook"></a>
		<a href="https://www.twitter.com/" class="fa fa-twitter"></a>
		<a href="https://www.instagram.com/" class="fa fa-instagram"></a>   
		<a href="http://cordonbleu.atwebpages.com/index.php" class="copyrights"> 2019-cordonbleu.com</a>                 
	</div>
</div>
</div>
</body>

</html>


