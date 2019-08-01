<?php
//require_once('connect.php');
//require('config.php');
ini_set ("SMTP","localhost");
ini_set ("sendmail_from","ak2427123@gmail.com");
require ('PHPMailerAutoload.php');
$connect = mysqli_connect('localhost','root', '', 'adminpanel');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$sql = "SELECT * FROM `admin` WHERE email = '$email'";
	$res = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($res);
	// $password = rand(999, 99999);
	// $password_hash = md5($pass);
	// $r = mysqli_fetch_assoc($res);
 //     $email = $r['email'];
 //      $usql = "UPDATE `login` SET password='$password_hash' WHERE email='$email'";
 //      $result = mysqli_query($connection, $usql);
 //      if($result){
 //      //send email here
 //      }



	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";
		
 
		$message = "Please use this password to login " . $password;
		$headers = "From : ak2427123@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}
 
	}else{
		echo "User name does not exist in database";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
	<div class="first">

		<form action="emailDemo.php" method="POST" enctype="multipart/form-data">
		<h1> forgot password </h1>
		<label>Enter Email</label>
		<input type="email" name="email" placeholder="enter email id">
		<input type="submit" name="forgot" value="Submit">
		</form>
	</div>

</body>
</html>
 
 