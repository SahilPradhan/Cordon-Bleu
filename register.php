<?php
   $server     = "fdb22.awardspace.net";
   $username   = "3183993_restaurantdb";
   $password   = "sillychef123";
   $database   = "3183993_restaurantdb";

   $con = mysqli_connect($server, $username, $password, $database);

   if(!$con){
      die("Error : " . $con->connect_error);
   }
   echo "Connection Established <br>";

   $name      = $_POST["name"];
   $email     = $_POST["email"];
   $password  = $_POST["password"];
   $city      = $_POST["city"];
   $zip       = $_POST["zip"];
 

   $sql = "insert into company_details(name, email, password, city, zip ) values('$name', '$email', '$password', '$city', '$zip' )";

   echo $sql . "<br>";
   if($con->query($sql) == TRUE){
      echo "Record Inserted";
   }else{
      echo($con->error);
   }
?>