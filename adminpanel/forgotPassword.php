<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"><!-- <link css file> -->
    <script type="text/javascript" src="javascript/validate.js"></script> <!-- link js file -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script> <!-- link jQuery library -->
</head>
<body>
	<h1>Admin Panel</h1>
	<div class="forgot">
	<form action="forgotPassword.php" method="POST" enctype="multipart/form-data">
		<?php include('errors.php'); ?>
		<div class="msg"><?php echo $msg2 ;?></div>
		<h2>Forgot Password</h2>
           <div class="forgotboxstyle">
				<label>Email:</label>
				<input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $email; ?>">
                <label>Enter New Password:</label>
                <input type="password" name="password" placeholder="Password" id="Password">
                 <label>Re-enter New Password:</label>
                 <input type="password" name="cpassword" placeholder="Re-enter Password" id="cpassword">
                <input type="submit" name="forgotPassword" value="Submit"> 
                <p>Click here for<a href="login.php" id="login1"> Login</a></p>        
            </div>
        
        
        </form>
</div>
</body>
</html>