<?php

	if(isset($_SESSION))
	{
		header('Location: ToDoList.php');
	}
	if(isset($_GET['error']))
	{
		$error = $_GET['error'];
		if($error == 1){echo "Username or Password is incorrect.";}
		if($error == 2){echo "Nice try, not that easy.";}
		if($error == 3){echo "Passwords don't match, yo.";}
		if($error == 4){echo "Email Address is already registered.";}
	}
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="mainWrapper">
		<div id="entryForms">
			<div id="loginWrapper">
				<h1>Login</h1>
				<fieldset>
					<form id="loginForm" class="formStan" action="login.php" method="POST">
						<label for="loginEmail">Email Address</label><input name="loginEmail" type="text"><br>
						<label for="loginPass">Password</label><input name="loginPass" type="password"><br>
						<input type="submit" name="Login" value="Login">
					</form>
				</fieldset>
			</div>
			<div id="registerWrapper">
				<h1>Register</h1>
				<fieldset>
					<form id="registerForm" class="formStan" action="register.php" method="POST">
						<label for="regEmail">Email Address</label><input name="regEmail" type="text"><br>
						<label for="regPass">Password</label><input name="regPass" type="password"><br>
						<label for="regConfirmPass">Confirm Password</label><input name="regConfirmPass"type="password"> <br>
						<input type="submit" name="Register" value="Register">
					</form>
				</fieldset>
			</div>
		</div>
	</div>
	
</body>
