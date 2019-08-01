<?php include('server.php'); ?> <!-- link to database -->
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"><!--  link to css file -->
	<script type="text/javascript" src="javascript/validate.js"></script> <!-- link to js file -->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script> <!-- link to jQuery library -->
</head>
<body>

	<h1>Admin Panel</h1>
	<div class="signup">
		
		<form action="register.php" method="post" enctype="multipart/form-data"> <!-- Create Form for signup -->
			<?php include('errors.php'); ?>
			<h2>Create Account</h2>
				<div class="boxstyle">	
					<label>Username:</label>
					<input type="text" name="username" placeholder="Username"  id="username" value="<?php echo $username; ?>">

					<label>Email:</label>
					<input type="text" name="email" placeholder="Email"  id="email"  value="<?php echo $email; ?>">

					<label>Password:</label>
					<input type="password" name="password" placeholder="Password" id="password">

					<label>Confirm Password:</label>
					<input type="password" name="confirm_password" placeholder="Confirm Password" id="ConfirmPassword">

					<!--input type="button" name="cancel" value="Cancel"-->
					<input type="submit" name="submit" value="Submit" onchange="validate()" id="submit">
					<!-- if you are aleady a member link for login -->
					<p> Already a Member ? &nbsp;<a href="login.php" id="login1">Login</a></p> 
				</div>
		</form>	

</body>
</html>