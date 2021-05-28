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
    header("Location:loginnew.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
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

  @keyframes fade-in 
  {

    0%
    {
      background-image: url("chef3.jpg"); opacity: 0;
    }
    33%
    {
      background-image: url("chef3.jpg"); opacity: 0.25;
    }
    67%
    {
      background-image: url("chef33.jpg"); opacity: 0.5;
    }
    100%
    {
      background-image: url("chef33.jpg"); opacity: 1;
    }

}
  </style>

  <style type="text/css">

    * {
  box-sizing: border-box;
}
  /* Add a background color and some padding around the form */
.container {
  border-radius: 0px;
  background-color: #f2f2f2;
  padding: 10px;
}
.column {
  background-color: #f2f2f2;
  float: left;
  width: 50%;
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
      <h1>About Us</h1><br><br>
    </div>
    <br><br>
    <div class="container">
      <p><b>About Cordon Bleu :</b><br>Cordon Bleu is a website that provides assistance to restaurant chefs. It includes features such as creating recipes, viewing recipes, updating and viewing logs. Cordon Bleu also provides functionality for the inventory manager to add and manage inventory.</p>
      <p><b>Disclaimer :</b><br>"cordonbleu.atwebpages.com" is a website for educational purposes only. We do not own any rights to any media used whatsoever. This website was made as part of the curriculum at SIES GST Engineering College, Nerul, Navi Mumbai - 400703, India. </p>
      <div class="row">
      
        <div class="col">
          <p><b>Facebook :</b></p>
          
          <a href="#"><i class="fa fa-facebook-official"></i> www.facebook.com/cordonbleu</a>
          

        </div>

        <div class="col">
          <p class="frontend-enhanced-title"><b>Twitter :</b></p>
          
          <a href="#"><i class="fa fa-twitter"></i> www.twitter.com/cordonbleu</a>
        </div>

      </div>

      <div class="row">
      
        <div class="col">
          <p><b>Instagram :</b></p>
          
          <a href="#"><i class="fa fa-instagram"></i> www.instagram.com/cordonbleu</a>
          

        </div>

        <div class="col">
          <p class="frontend-enhanced-title"><b>Gmail :</b></p>
          
          <a href="#"><i class="fa fa-google"></i> www.gmail.com/cordonbleu</a>
        </div>

      </div>

    </div>

    <!--EVERYTHING ELSE HERE -->

    <!--FOOTER HERE --> 

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