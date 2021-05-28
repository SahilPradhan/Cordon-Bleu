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
 

  $name = $_POST['name'];
  $email = $_POST['email'];
  $feedback = $_POST['feedback'];

  $query = "insert into feedback_details(name,email,feedback) values ('$name','$email','$feedback')";
  $result = $con->query($query);
  if(!$result){
      echo $con->error;
    }
    else{
      //$output .= "Record added.";
    }
    $con->close();
  }


?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us.</title>
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
  <!-- CSS FILE HERE-->
  <link rel="stylesheet" type="text/css" href="multi.css">
  <style type="text/css">

  body{
    animation: fade-in 1s;
    background-image: url("chef33.jpg");
      background-size: cover;

    background-color: grey;
    overflow: hidden;
  }

  } 
.hero{
  background-image: url("chef33.jpg");
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
      background-image: url("chef3.jpg"); opacity: 0;
    }
    33%{
      background-image: url("chef3.jpg"); opacity: 0.25;
    }
    67%{
      background-image: url("chef33.jpg"); opacity: 0.5;
    }
    100%{
      background-image: url("chef33.jpg"); opacity: 1;
    }

}
  </style>

  <style type="text/css">
    input[type=text], textarea{
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}
  </style>
  
</head>
<body>

  <div class="hero">
    <!--HEADER HERE-->
    <div class="header">
      <nav class="navbar navbar-expand-sm navbar-dark sticky-top">

        <a href="chef_manager.php"><span id="navbar-brand-title" class="navbar-brand">Cordon Bleu</span></a>

        <button class="navbar-toggler btn-dark" data-toggle="collapse" data-target="#navbar-Menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-Menu">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="chef_manager.php" class="nav-link">Home</a>
            </li>

            <!--<li class="nav-item">
              <a href="loginnew.php" class="nav-link">Login/Sign-up</a>
            </li>-->

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
                      <p class="nav-link" href="" data-target="#myModal" data-toggle="modal" style="color:white;" style="mix-blend-mode: difference;"><i class="fa fa-user-circle-o"></i><?php echo $_SESSION["email"]; ?></p>
                  </li>
          </ul>
        </div>      
      </nav>
    </div>
    <div class="title" align="center">
      <h1>Contact Us</h1><br>
    </div>
    <br><br>
    <div class="container">
  <form method="post">

    <p>Please fill out this feedback form and we'll get in touch with you as soon as possible.</p><br>
    <label for="name">First Name</label>
    <input type="text" id="name" name="name">

    <label for="email">Email</label>
    <input type="text" id="email" name="email">

    <label for="feedback">Feedback</label>
    <textarea id="feedback" name="feedback" style="height:150px"></textarea>

    <input type="submit" value="Submit" name="submit" id="submit">

  </form>
</div>

    <!--EVERYTHING ELSE HERE -->

    <!--FOOTER HERE --> 

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