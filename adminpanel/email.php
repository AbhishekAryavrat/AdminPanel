<?php

$connect = mysqli_connect('localhost','root', '', 'adminpanel');
if(isset($_POST['forgot']))
{
	$email = $_POST['email'];

	$select = "SELECT * FROM admin WHERE email = '$email'";
	$result = mysqli_query($connect,$select);
	$count = mysqli_num_rows($result);
	$data = mysqli_fetch_array($result);
	$emaildata = $data['email'];
	//$namedata = $data['username'];

	$url ='http://localhost/adminpanel/forgotPassword.php';

	$output = "click on this link for change password";

	if($email == $emaildata)
	{

			require ('PHPMailerAutoload.php');
			require('al.php');

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Localhost');
			$mail->addAddress($email, 'user');     // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Reset the Password:';
			$mail->Body    = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
	}
	else
	{
		$errmsg = "your email id is invalid";
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

		<form action="email.php" method="POST" enctype="multipart/form-data">
		<h1> forgot password </h1>
		<label>Enter Email</label>
		<input type="email" name="email" placeholder="enter email id">
		<input type="submit" name="forgot" value="Submit">
		</form>
	</div>

</body>
</html>