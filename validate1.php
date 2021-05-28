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
            $name = $_POST["name"];
            $city = $_POST["city"];
            $zip = $_POST["zip"];
            $role = $_POST["role"];
            


            $sql = "INSERT INTO company_details (name, email, password, city, zip, role) VALUES ('$name', '$email', '$password', '$city', '$zip', '$role')";

            if ($con->query($sql) === TRUE) 
            {
                header("Location:index.php");
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $con->error;
            }


        }
       
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
	<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="multi.css">
    <link rel="stylesheet" type="text/css" href="global.css">
    <style type="text/css">
        body
        {
            background-image: url("chef3.jpg");
            background-size: cover;
            width: 100%;
            height: 100vh;


        }

        
        
    </style>
</head>

<body><div class="hero">
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
                            <p class="nav-link" data-target="#myModal" data-toggle="modal" style="color:white;" style="mix-blend-mode: difference;"><i class="fa 
                        fa-user-circle-o"></i><?php //echo $_SESSION["email"]; ?></p>
                        </li>
                    </ul>-->

                </div>          
            </nav>
        </div>

        <div class="foot" align="center">
                <a href="https://www.facebook.com/" class=" fa fa-facebook"></a>
                <a href="https://www.twitter.com/" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/" class="fa fa-instagram"></a>   
                <a href="http://cordonbleu.atwebpages.com/index.php" class="copyrights"> 2020-cordonbleu.com</a>   

        </div>

    </div>


    <link rel="stylesheet" type="text/css" href="global.css">
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form class="form-container" method="POST" onsubmit=" return validation()" style="position:relative;
  top: 0vh;
  background-color: rgba(0,0,0,0.5);
  padding: 5px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px 0px #000;">

                  <div class="form-group">
                    <label for="exampleName" style="color: white">Name:</label>
                    <input name="name" id="name" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="name1" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" style="color: white">Restaurant Email :</label>
                    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="email1" class="text-danger font-weight-bold"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleRole" style="color: white">Role :</label>
                    <select type="select" name="role" id="role" class="form-control" aria-describedby="roleHelp" style="background-color: rgba(0,0,0,0.5); color: white;">
                        <option>Head Chef</option>
                        <option>Inventory Manager</option>
                    </select>
                    <span id="role1" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleCity" style="color: white">City :</label>
                    <input name="city" id="city" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="city1" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleZip" style="color: white">Zip :</label>
                    <input name="zip" id="zip" type="text" class="form-control" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="zip1" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" style="color: white">Password :</label>
                    <input name="password" id="password" type="password" class="form-control" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="password1" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2" style="color: white"> Confirm Password :</label>
                    <input name="confirmpass" id="confirmpass" type="password" class="form-control" style="background-color: rgba(0,0,0,0.5); color: white;">
                    <span id="confirmpass1" class="text-danger font-weight-bold"> </span>
                  </div>
                  
                  <button type="submit" class="btn btn-primary btn-block" >Create Account</button>
           
                </form>
            </section> 

            
            
        </section>
        
    </section>

	<!--<form method="post" style="width:500px; margin: auto;" action="register.php" onsubmit="return validation()" class="transparent-input" class="bg-light">
        <div class="form-group">
            <label for="name" class="font_color">Username</label>
            <input type="text" name="name" id="name" class="form-control input_style">
            <div class="invalid-feedback">Please enter a valid username.</div>
            <span id="name1" class="text-danger font-weight-bold"></span>
        </div>
        <div class="form-group">
            <label for="email" class="font_color">Email</label>
            <input type="email" name="email" id="email" class="form-control input_style">
            <div class="invalid-feedback">Please enter a valid username.</div>
            <span id="email1" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label for="password" class="font_color">Password</label>
            <input type="password" name="password" id="password" class="form-control input_style">
            <span id="password1" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label for="confirmpass" class="font_color">Confirm Password</label>
            <input type="password" name="confirmpass" id="confirmpass" class="form-control input_style">
            <span id="confirmpass1" class="text-danger font-weight-bold"> </span>
        </div> 
        <div class="form-group">
            <label for="city" class="font_color">City</label>
            <input type="text" name="city" id="city" class="form-control input_style">
            <span id="city1" class="text-danger font-weight-bold"> </span>
        </div>
        <div class="form-group">
            <label for="zip" class="font_color">Zipcode</label>
            <input type="text" name="zip" id="zip" class="form-control input_style">
            <span id="zip1" class="text-danger font-weight-bold"> </span>
        </div>
        <center><button type="submit" name="submit" id="submit" class="btn btn-dark" style="background-color: purple; padding: 10px 20px; font-size: 20px">Submit</button></center>
        
    </form>-->

<script type="text/javascript">



    function validation()
    {

        var reg1 = /^([a-z A-Z]+)$/;
        var reg2 = /^([a-z A-Z 0-9\.-]+)@([a-z A-Z 0-9]+).([a-z]{2,8})(.[a-z]{2,8})$/;
        var reg3 = /^([a-z A-Z 0-9\!@#$%^&*]+)$/;
        var reg4 = /^([0-9]+)$/;
        var reg5 = /^([789]\d{9})$/;


        var name = document.getElementById('name').value;
        var emails = document.getElementById('email').value;
        var role = document.getElementById('role').value;
        var password = document.getElementById('password').value;
        var confirmpass = document.getElementById('confirmpass').value;
        var city = document.getElementById('city').value;
        var zip = document.getElementById('zip').value;

        if(name == "")
        {
            document.getElementById('name1').innerHTML ="Please fill the name field";
            return false;
        }

        if(reg1.test(name))
        {
            //success
        }
        else
        {
            document.getElementById('name1').innerHTML ="Please enter  valid name";
            return false;
        }


        if(emails == "")
        {
            document.getElementById('email1').innerHTML ="Please fill the email id field";
            return false;
        }
        /*if(emails.indexOf('@') <= 0 )
        {
            document.getElementById('email1').innerHTML ="@ at Invalid Position";
            return false;
        }*/

        if(reg2.test(emails))
        {
            //success
        }
        else
        {
            document.getElementById('email1').innerHTML ="Invalid email id.";
            return false;
        }

        if(city == "")
        {
            document.getElementById('city1').innerHTML ="Please fill city field";
            return false;
        }

        if(reg1.test(city))
        {
            //success
        }
        else
        {
            document.getElementById('city1').innerHTML ="Please enter a valid city name";
            return false;
        }




        if(zip == "")
        {
            document.getElementById('zip1').innerHTML ="Please enter zip code";
            return false;
        }

        if (isNaN(zip)) 
        {
            document.getElementById('zip1').innerHTML =" Enter a valid zip code";
            return false;
        }

        if(password == "")
        {
            document.getElementById('password1').innerHTML ="Please fill the password field";
            return false;
        }
        if((password.length <= 5) || (password.length > 20)) 
        {
            document.getElementById('password1').innerHTML ="Passwords lenght must be between  5 and 20";
            return false;   
        }

        if(confirmpass == "")
        {
               document.getElementById('confirmpass1').innerHTML ="Please fill the confirmpassword field";
               return false;
        }


        if(password!=confirmpass)
        {
              document.getElementById('confirmpass1').innerHTML ="Password does not match the confirm password";
              return false;
        }

        






        
    }


</script>
</body>

</html>
