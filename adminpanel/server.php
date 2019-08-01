<?php
session_start();// session start 

$username="";
$email ="";
$errors = array();
$msg =" "; 
$msg1=" "; 
$msg2=" ";

// connect to database
$connect = mysqli_connect('localhost','root','','adminpanel');

if(isset($_POST['submit']))
{
	// variable declaration
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);

	// check input box empty or not
	if(empty($username))
	{
		array_push($errors, "Username is required(101)");
	}
	if(empty($email))
	{
		array_push($errors, "Email is required(102)");
	}
	if(empty($password))
	{
		array_push($errors, "Password is required(103)");
	}
	if($password != $confirm_password)
	{
		array_push($errors, "Password do not match(104)");
	}

	// retreive email from database
	$user_check_query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1 ";
	$result = mysqli_query($connect, $user_check_query);
	$user =mysqli_fetch_assoc($result);

		if($user['email'] === $email)// Check Email already registered
			{
				array_push($errors, "Email already exists(105)");
			}



			if(count($errors) == 0)
			{
				$password = md5($password);
				$sql= "INSERT INTO admin (username,email,password) VALUES ('$username','$email','$password')";
				mysqli_query($connect,$sql);
				$msg = "Sign In succesfully";
				header("location: login.php"); 
			}
		
}


//for login page database

if(isset($_POST['login']))
{
	//declare variable
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);

	// Check input box empty or not
	if(empty($email))
	{
		array_push($errors, "Email is required(106)");
	}

	if(empty($password))
	{
		array_push($errors, "Password is required(107)");
	}

	// Check errors 
	if(count($errors) == 0)
	{
		$password = md5($password);
		$sql= "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";// fetch data from database
		//echo($sql);
		$result = mysqli_query($connect, $sql);
		
		if(mysqli_num_rows($result) == 1)
		{
			$msg1= "You logged in succesfully";	
			header("location:adminpanel.php");
		}
		else
		{
				array_push($errors, "Wrong email and password combination(108)");
		}
	}
}



// For forgot Password

if(isset($_POST['forgotPassword']))
{
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);

	if(empty($email))
		{
			array_push($errors, "Enter your Email(109) ");
		} 
	// if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	// 	{
	// 			array_push($errors, "Enter a Valid Email Address");
	// 	}
	if(empty($password))
		{
			array_push($errors, "Enter your New password(110)");
		}
	if(empty($cpassword))
		{
			array_push($errors, "Re-enter your New password(111)");
		}
	if($password != $cpassword)
		{
			array_push($errors, "Password do not match(112)");
		}

		$user_check_query = "SELECT * FROM admin WHERE email = '$email' ";
		$result = mysqli_query($connect, $user_check_query);
		$user =mysqli_fetch_assoc($result);

		if($user['email'] != $email)// Check Email already registered
			{
				array_push($errors, "Invalid Email ID(113)");
			}


			if(count($errors) == 0)
			{
				$password = md5($password);
				$sql= "UPDATE admin SET password = '$password' WHERE email = '$email' ";
				mysqli_query($connect,$sql);
				$msg2 = "password reset succesfully";
				header("location: forgotPassword.php"); 
			}
		
}
		mysqli_close($connect);

?>





