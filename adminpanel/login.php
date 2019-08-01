<?php include('server.php'); ?> <!-- for link to database -->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"><!-- <link css file> -->
    <script type="text/javascript" src="javascript/validate.js"></script> <!-- link js file -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script> <!-- link jQuery library -->
</head>

<body>
	<h1>Admin Panel</h1>
	<div class="login">
        <form action="login.php" method="post"> <!-- create a form -->
            <?php include('errors.php'); ?>
            <h2>Login</h2>
            <div class="loginboxstyle">
                
                <label>Email</label>
                <input type="text" name="email" placeholder="Email" id="Email"  value="<?php echo $email; ?>">
                <label> Password</label>
                <input type="password"  name="password" placeholder="Password" id="Password">
                
                <input type="submit" name="login" value="Login" onclick="loginValidation()" id="login">
                <p>Not a user?&nbsp;<a href="register.php" id="register1">SignUp</a></p><!--Not a user and for signup lin-->
                <p><a href="forgotPassword.php" id="forgot1">Forgot password?</a></p><!-- for Forgot password link-->
            
            
            
            </div>
        
        
        </form>
    
    </div>

</body>
</html>