<?php 
	include ("config.php");
	if (!isset($_GET["code"])) {
		exit("PAGE NOT FOUND");
	}
	$code = $_GET["code"];
	$getEmailQuery = mysqli_query($con, "SELECT email FROM reset_password WHERE code='$code'"); 
	if (mysqli_num_rows($getEmailQuery) == 0) {
		exit("PAGE NOT FOUND !");
	}
		if (isset($_POST["password"])) 
		{
			$pw = $_POST["password"];
			//$pw = md5($pw);

			$row = mysqli_fetch_array($getEmailQuery);
			$email = $row["email"];
			//echo $email;

			$query = mysqli_query($con, "UPDATE company_details SET password='$pw' WHERE email='$email'");
			if ($query) 
			{
				$query = mysqli_query($con, "DELETE FROM reset_password WHERE code='$code'");
				exit("Password upated");
			}
			else
			{
				exit("Something went wrong");
			}
		}	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<style type="text/css">
  		body
  		{
  			background-image: url("table6.jpg");
  			background-size: 1600px 800px;
  		}
  	</style>
</head>
<body>
	<form method="POST">
	<br><br><br>
	<center><input type="password" name="password" placeholder="Enter Password"></center>
	<br>
	<center><input type="password" name="password1" placeholder="Re-enter Password"></center>
	<br>
	<center><input type="submit" name="submit" value="Update password"></center>
</form>
</body>
</html>
