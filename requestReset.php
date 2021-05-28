<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//require 'config.php';

$con = mysqli_connect("fdb22.awardspace.net","3183993_restaurantdb","sillychef123","3183993_restaurantdb");


// Instantiation and passing `true` enables exceptions

if(isset($_POST["email"])){

	$emailTo = $_POST["email"];

	$code = uniqid(true);
	$query = mysqli_query($con, "INSERT INTO reset_password(code, email) VALUES('$code', '$emailTo')");
	if (!$query) 
        {

				exit("An error occurred. Please try again.");	
	}

	$mail = new PHPMailer(true);

	try {
		    //Server settings
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'team.sillychef@gmail.com';                     // SMTP username
		    $mail->Password   = 'sillychef123';                               // SMTP password
		    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('team.sillychef@gmail.com', 'Team-SillyChef');
		    $mail->addAddress($emailTo);     // Add a recipient
		    $mail->addReplyTo('team.sillychef@gmail.com', 'No reply');


		    // Content
		    $url = "http://". $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
                    // . $_SERVER["HTTP_HOST"] 
		    $mail->isHTML(true);                                 
		    $mail->Subject = 'Your password reset link';
		    $mail->Body    = "<h1>Your requested a password reset</h1>
		    					Click <a href='$url'>this link</a> to do so";
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Reset password link has been sent to your email';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	exit();

	}



?>

<form method="POST">
	<input type="text" name="email" placeholder="Email" autocomplete="off">
	<br>
	<input type="submit" name="submit" value="Reset email">
</form>
















