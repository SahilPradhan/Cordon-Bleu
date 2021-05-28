<?php 
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
$output = NULL;
if(isset($_POST['submit'])){
	//connect to database
	$server     = "fdb22.awardspace.net";
	$username   = "3190764_restaurantdb";
	$password   = "cordon@123";
	$database   = "3190764_restaurantdb";
	$con = mysqli_connect($server, $username, $password, $database);
	if(!$con){
		die("Error : " . $con->connect_error);
	}
	$date = date("Y/m/d");
	$time = date("h:i:sa");

	$email = $_SESSION['email']; //SESSION VARIABLE
	$name = $_POST['name'];
	$ingredients = $_POST['ingredients'];
	$qty = $_POST['qty'];
	$unit = $_POST['unit'];

	$query1 = "insert into makerecipe_details(email,recipe_name,date,time) values ('$email','$name','$date','$time')";
	$log_record = $con->query($query1);
	if(!$log_record){
		echo $con->error;
	}

	foreach ($ingredients as $key => $value) {

		$query = "insert into recipe_details(name,email,ingredients,qty,unit)
		values (
		'$name',
		'$email',
		'"
		. $con->real_escape_string($value) .
		"','"
		. $con->real_escape_string($qty[$key]) .
		"','"		
		. $con->real_escape_string($unit[$key]) .
		"')";
		
		$insert = $con->query($query);
		if(!$insert){
			echo $con->error;
		}
		else{
			$output .= "Record added.";
		}
	}
	
	

	$con->close();
}

?>

<html>
<head>
	<title>multi input</title>
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
	<!-- CSS FILE -->
	<link rel="stylesheet" type="text/css" href="multi.css"> 
	<script>
		$(document).ready(function(e){

			var html =' <div><br><div class="row"><div class="col"><div><input type="text" name="ingredients[]" id="childingredients" placeholder="Ingredient" class="form-control" required></div></div><div class="col"><div><input type="number" name="qty[]" id="childqty" placeholder="Qty" class="form-control" required></div></div><div class="col"><div><select id="childunit" name="unit[]" class="form-control" required><option value="kg">kg</option><option value="g">g</option><option value="oz">oz</option><option value="lit">lit</option><option value="ml">ml</option><option value="units">units</option><option value="cups">cups</option><option value="tablespoon">table spoon</option></select></div></div></div><a href="#" id="remove" class="btn btn-danger form-control">Remove</a></div> ';

			$('#add').click(function(e){

				$('#container').append(html);

			});

			$('#container').on('click','#remove',function(e){

				$(this).parent('div').remove();
			});


		});

	</script>
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
		<br><br>
		<div class="title" align="center">
			<h1>Create new recipe</h1><br><br><br><br>
		</div>
		<div class="add_recipe_card">
			<form method="post" id="add_recipe"><br>
				<div align="center">
					<div id="container" align="center">
						<div>
							<input type="text" name="name" id="name" placeholder="Recipe name" class="form-control" required>
						</div><br>
						<div class="row">
							<div class="col">
								<div>
									<input type="text" name="ingredients[]" id="ingredients" placeholder="Ingredient" class="form-control" required>
								</div>
							</div>
							<div class="col">
								<div>
									<input type="number" name="qty[]" id="qty" placeholder="Qty" class="form-control" required>
								</div>
							</div>
							<div class="col">
								<div>
									<select id="unit" name="unit[]" class="form-control" required>
										<option value="kg">kg</option>
										<option value="g">g</option>
										<option value="oz">oz</option>
										<option value="lit">lit</option>
										<option value="ml">ml</option>
										<option value="units">units</option>
										<option value="cups">cups</option>
										<option value="tablespoon">table spoon</option>

									</select>
								</div>
							</div>
						</div>			
					</div>
				</div><br>
				<div align="center">
					<a href="#" id="add" class="btn btn-info">Add more</a>
				</div>
				<br>

				
				<div align="center" id="submit-btn">
					<input type="submit" name="submit" class="btn btn-success" value="Submit">
				</div>	

			</form>
		</div>
		
		<br><br>


		<div align="center">
			<div class="foot">
				<a href="https://www.facebook.com/" class=" fa fa-facebook"></a>
				<a href="https://www.twitter.com/" class="fa fa-twitter"></a>
				<a href="https://www.instagram.com/" class="fa fa-instagram"></a>   
				<a href="#" class="copyrights"> 2019-cordonbleu.com</a>                 
			</div>		
		</div>
		

	</div>
	

</body>
</html>