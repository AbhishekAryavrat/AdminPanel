function validate()
{
	//alert(UserName);
	var username = document.getElementById('username').value;
	var Email =document.getElementById('email').value;
	var Password = document.getElementById('password').value;
	var confirm_password = document.getElementById('ConfirmPassword').value;
	name= nameValidate(username);
		if(name == "is_empty")
			{
				alert("Fill the Username(101)");
				return false;
			}
		else if(name == "is_alpha")
			{
				alert("Incorrect Username Format(102)");
				return false;
			}
	email =  nameValidate(Email);
		if (email == "is_empty")
			{
				alert("Fill the Email(103)");
				return false;
			}

	email1 = emailValidate(Email);
		if(email1 == false)
			{
				alert("Incorrect Email(104)");
				return false;
			}

	password = nameValidate(Password);
		if(password == "is_empty")
			{
				alert("Fill the Password(105)");
				return false;
			}

	password1 = passwordValidate(Password);
		if(password1 == false)
			{
				alert("Incorrect Format(Password must be between 4 and 8 digits long and include at least one numeric digit)(106)");
				return false;
			}
	ConfirmPassword = nameValidate(confirm_password)
		if(ConfirmPassword == "is_empty")
		{
			alert("Fill the Confirm Password(107)");
			return false;
		}

	if(Password != confirm_password )
	{
		alert("Password do not match(108)");
		return false;
	}
}

 function nameValidate(name)
 {
 	var name_length = name;
 	var alpha =/^[a-z,A-z\s-, ]+$/;
 	if(name_length == '')
 	{
 		return "is_empty";
 	}
 	else if(!name_length.match(alpha))
 	{
 		return "is_alpha";
 	}
 }

 function emailValidate(email)
 {
 	var email_Pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 	if(!email.match(email_Pattern))
 	{
 		return false;
 	}
 }

 function passwordValidate(password)
 {
 	var passPattern = /^(?=.*\d).{4,8}$/;
 	if(!password.match(passPattern))
 	{
 		return false;
 	}
 }


 function loginValidation()
 {
 	var email1 = document.getElementById('Email').value;
 	var password1= document.getElementById('Password').value;


 	 email = nameValidate(email1)
 	 if(email == "is_empty")
 	 {
 	 	alert("Fill the Email(109)");
 	 	return false;
 	 }

 	 email2 = emailValidate(email1);
 	 if(email2 ==  false)
 	 {
 	 	alert("Incorrect Email Format(110)");
 	 	return false;
 	 }

 	 password = nameValidate(password1);
		if(password == "is_empty")
			{
				alert("Fill the Password(111)");
				return false;
			}

	password2 = passwordValidate(password1);
		if(password2 == false)
			{
				alert("Incorrect Format(Password must be between 4 and 8 digits long and include at least one numeric digit)(112)");
				return false;
			}
 }