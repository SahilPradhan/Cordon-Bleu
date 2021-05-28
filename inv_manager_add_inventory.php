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

//connect to db
$output = NULL;
if(isset($_POST['submit']))
{
	//connect to database
	$server     = "fdb22.awardspace.net";
	$username   = "3190764_restaurantdb";
	$password   = "cordon@123";
	$database   = "3190764_restaurantdb";
	$con = mysqli_connect($server, $username, $password, $database);
	if(!$con)
        {
		die("Error : " . $con->connect_error);
	}
        $email = $_SESSION['email'];
	$ingredients = $_POST['ingredients'];
	$qty = $_POST['qty'];
	$unit = $_POST['unit'];

	foreach ($ingredients as $key => $value) 
        {

		$query = "insert into inventory_details(ingredients,email,qty,unit)
		values (
		'"
		. $con->real_escape_string($value) .
                "','$email','"
		. $con->real_escape_string($qty[$key]) .
		"','"
		. $con->real_escape_string($unit[$key]).
		"') ";

		$add = $con->query($query);
		if(!$add)
                {
			echo $con->error;
		}
		else
                {
			$output .= "Record added.";
		}
	}

	$con->close();
}
?>
<html>
<head>
	<title>Inventory Manager</title>
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
	<script>
		$(document).ready(function(e){

			var html =' <div><br><div class="row"><div class="col"><div><input type="text" name="ingredients[]" id="childingredients" placeholder="Ingredient" class="form-control" required></div></div><div class="col"><div><input type="number" name="qty[]" id="childqty" placeholder="Qty" class="form-control" required></div></div><div class="col"><div><select id="childunit" name="unit[]" class="form-control" required><option value="kg">kg</option><option value="g">g</option><option value="oz">fl/oz</option><option value="lit">lit</option><option value="ml">ml</option><option value="units">units</option><option value="cups">cups</option><option value="tablespoon">table spoon</option></select></div></div></div><a href="#" id="remove" class="btn btn-danger form-control">Remove</a></div> ';

			$('#add').click(function(e){

				$('#inv_manager_add_inventory_card_container').append(html);

			});

			$('#inv_manager_add_inventory_card_container').on('click','#remove',function(e){

				$(this).parent('div').remove();
			});


		});

	</script>
	<script>
				function showCustomer(str) {
					var xhttp;  
					if (str == "") {
						document.getElementById("txtHint").innerHTML = "";
						return;
					}
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("txtHint").innerHTML = this.responseText;
						}
					};
					xhttp.open("GET", "getcustomer.php", true);
					xhttp.send();
				}
			</script>
	<style type="text/css">

		body{
			animation: fade-in 1s;
			background-image: url("chef3.jpg");
			background-color: grey;
			overflow-x: hidden;
			background-size: cover;

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

				<a href="inv_manager_2.php"><span id="navbar-brand-title" class="navbar-brand">Cordon Bleu</span></a>

				<button class="navbar-toggler btn-dark" data-toggle="collapse" data-target="#navbar-Menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-Menu">
					<ul class="navbar-nav">
					
						<li class="nav-item">
							<a href="inv_manager_2.php" class="nav-link">Inventory Manager</a>
						</li>

						<li class="nav-item">
							<a href="aboutus_inv.php" class="nav-link">About us</a>
						</li>

						<li class="nav-item">
							<a href="contactus_inv.php" class="nav-link">Contact us</a>
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
		<!-- CONTENT -->
		<div class="title" align="center">
			<h1>Add new inventory</h1><br>
		</div>
		<div class="inv_manager_add_inventory_card">
			<form method="post" id="add_recipe"><br>
				<div align="center">
					<div id="inv_manager_add_inventory_card_container" align="center">

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
										<option value="oz">fl/oz</option>
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
					<input type="submit" name="submit" class="btn btn-success">
				</div>		
			</form>
		</div>
		
		<!-- VIEW DATA -->
		<form>
			<!--<div class="viewdata-table">
				<div class="table-respnsive">
					<table class="table table-striped table-hover">
						<tr class="success">
							<th>Ingredients</th>					
							<th>Quantity</th>
							<th>Unit</th>
						</tr>
						<?php
						/*
						$output = NULL; 
				$server     = "localhost:3306";
				$username   = "root";
				$password   = "";													//Database connection
				$database   = "restaurantdb";
				$con = mysqli_connect($server, $username, $password, $database);
				if(!$con){
					die("Error : " . $con->connect_error);
				}
				$query = "select* from inventory_details";			//Query execution
				$result = $con->query($query);
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
		*/
			?>
		</table>
	</div>
</div> -->
<div align="center" id="viewdata-button" class="submit-inputs">
	<div>
		<input type="button" name="viewdata" value="View Inventory" class="form-control btn btn-info" onclick="showCustomer(this.value)">
		<center><br><br><div id="txtHint" style="color: white">Inventory data will be listed here...</div></center>	
	</div>

	
</div>
</form>
<br><br> 
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