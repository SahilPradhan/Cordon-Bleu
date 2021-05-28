<?php
session_start();


$server     = "localhost:3306";
$username   = "root";
$password   = "";
$database   = "restaurantdb";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("Error : " . $con->connect_error);
}
//echo "Connection Established <br>";
$name      = $_POST["name"];
$password  = $_POST["password"];
$_SESSION['name'] = $name;


$sql = "select* from company_details where name='$name' and password='$password'";
$result = $con->query($sql);
if($result->num_rows>0)
{
    if (isset($_SESSION['name'])){
        echo "Variable set<br>";
    }
    else{
        echo 'Variable not set<br>';
    }
    print_r($_SESSION['name']);

    echo"<br> You are a validated user.";}
    else
    {
        echo"Incorrect login details entered";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
  
     .font_color{
        color:white !important;
        border:2px purple !important;
        font-family: Verdana;
        font-size: 22px;
    }
</style>
    <div style="background-color: #660066">
        <h1 style="color:White"><center>SillyChef</center></h1>
    </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sillychef</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body background="table6.jpg">
<div>
    <div>
        <br> <center><h2 class="font_color" style="font-size: 36px">User Login</h2></center>
    </div>
    <br> <form method="post" style="width:500px; margin: auto;" action="check.php" class="transparent-input" class="bg-light">
           <div class="form-group">
            <label for="name" class="font_color">Username</label>
            <input type="text" name="name" id="name" class="form-control" style="border-radius: 12px; border-color: purple; border-width: 1.8px; background-color: transparent; color:white">
            <div class="invalid-feedback">Please enter a valid username.</div>
            <span id="name1" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label for="email" class="font_color">Email</label>
            <input type="email" name="email" id="email" class="form-control" style="border-radius: 12px; border-color: purple; border-width: 1.8px; background-color: transparent; color:white" >
            <div class="invalid-feedback">Please enter a valid username.</div>
            <span id="email1" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label for="password" class="font_color">Password</label>
            <input type="password" name="password" id="password" class="form-control" style="border-radius: 12px; border-color: purple; border-width: 1.8px; background-color: transparent; color:white">
            <span id="password1" class="text-danger font-weight-bold"> </span>
        </div>
       <center><button type="submit" name="submit" id="submit" class="btn btn-dark" style="background-color: purple; padding: 10px 20px; font-size: 20px">Submit</button></center>
        
    </form>
</div>

</body>

</html>
