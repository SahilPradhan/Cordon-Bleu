<?php
        if(isset($_POST["email"]) && isset($_POST["password"]))
        { 
            $con = mysqli_connect("fdb22.awardspace.net","3190764_restaurantdb","cordon@123","3190764_restaurantdb");

            if (mysqli_connect_errno())
            {
                echo "failed to connect " , mysqli_connect_errno();
            }
            
            $email = $_POST["email"];
            $password  = $_POST["password"];
            //$role = $_POST["role"];

            $sql = "SELECT * FROM company_details WHERE email='$email' AND password='$password'";
            $result = $con->query($sql);
            if($result->num_rows>0)
            {	


            	session_start();
            	$_SESSION["email"] = $email;

            	while ($row = mysqli_fetch_assoc($result)) 
            	{
            		
            		if ($row["role"]=="Head Chef") 
            		{	
            			header("Location:chef_manager.php");
            		}
            		else
            		{
            			header("Location:inv_manager_2.php");	
            		}


            	}

          	}
        
            else
            {
                echo"Incorrect login details entered";
            }
        }
        
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<style type="text/css">
  		body
  		{
  			background-image: url("chef3.jpg");
			width: 100%;
			height: 100vh;
      background-size: cover;
      overflow: hidden;
  		}
  	</style>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="" sorigin="anonymous">
  <!-- CSS FILE HERE-->
  <link rel="stylesheet" type="text/css" href="global.css">

  <link rel="stylesheet" type="text/css" href="multi.css">
  
</head>
<body>

	<div class="hero">
		<!--HEADER HERE-->
		<div class="header">
			<nav class="navbar navbar-expand-sm navbar-dark sticky-top">

				<span id="navbar-brand-title" class="navbar-brand">Cordon Bleu</span>

				<button class="navbar-toggler btn-dark" data-toggle="collapse" data-target="#navbar-Menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-Menu">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="index.php" class="nav-link">Home</a>
						</li>

						<li class="nav-item">
							<a href="index.php" class="nav-link">Login/Sign-up</a>
						</li>

						<li class="nav-item">
							<a href="aboutus.php" class="nav-link">About us</a>
						</li>

						<!--<li class="nav-item">
							<a href="contactus.php" class="nav-link">Contact us</a>
						</li>

						<li class="nav-item">
							<a href="logout.php" class="nav-link">Logout</a>
						</li>-->
					</ul>

					<!--<ul class="navbar-nav ml-auto">
            			<li class="nav-item">
                			<p class="nav-link" data-target="#myModal" data-toggle="modal" style="color:white;" style="mix-blend-mode: difference;"><i class="fa fa-user-circle-o"></i><?php// echo $_SESSION["email"];// ?></p>
            			</li>
        			</ul>-->

				</div>			
			</nav>
		</div>
			
		
	</div>	

		

	<section class="container-fluid bg">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-container" method="POST">
				  <div class="form-group">
				    <label for="exampleInputEmail1" style="color: white">Email address</label>
				    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" style="background-color: rgba(0,0,0,0.5);">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1" style="color: white">Password</label>
				    <input name="password" id="password"type="password" class="form-control" style="background-color: rgba(0,0,0,0.5);">
				  </div>
				  
				  <button type="submit" class="btn btn-primary btn-block">Login</button>
				  <a href="requestReset.php" style="color: white;">Forgot Password ?</a>
				  <br>
				  <p style="color: white">Don't have an account?</p>
				  <a href="validate1.php" class="btn btn-primary btn-block">Create Account</a>
				</form>
			</section> 

			
			
		</section>
		
	</section>
  <div align="center">
      <div class="foot">
      <a href="https://www.facebook.com/" class=" fa fa-facebook"></a>
      <a href="https://www.twitter.com/" class="fa fa-twitter"></a>
      <a href="https://www.instagram.com/" class="fa fa-instagram"></a>   
      <a href="http://cordonbleu.atwebpages.com/index.php" class="copyrights"> 2020-cordonbleu.com</a>  
      Sahil Pradhan
    </div>
    </div>

</body>
</html>