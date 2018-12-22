<?php
	include('./classes/db.php');

	if (isset($_POST['create-account']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username)))
		{
			#Checks if user already exists
			echo 'User already exists';

		} elseif ($username == null || $password == null || $email == null) 
		{
			#Checks if all fields are filled
			echo 'Please fill all fields required';

		} elseif (!(preg_match('/[a-zA-Z0-9_]+/', $username)))
		{
			#Checks if username has valid characters
			echo 'Invalid username';

		} elseif (strlen($password) < 6 && strlen($password) > 60)
		{
			#Checks if password has between 6 and 60 characters
			echo 'Password has to have between 6 and 60 characters';

		} elseif (!(preg_match('/[A-Z]+/', $password) && preg_match('/[0-9]+/', $password)))
		{
			#Check if password has a number and a letter
			echo 'Password needs atlest 1 number and 1 capital letter';

		} elseif (strlen($username) < 6 && strlen($username) > 32)
		{
			#Checks if username has between 8 and 32 characters
			echo 'Username has to have between 6 and 32 characters';

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			#Checks if email is valid
			echo 'Email not valid';

		} elseif (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
		{
			#Checks if email is valid
			echo 'Email already taken';
		} else 
		{
			#Creates account on the database
			DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
			echo 'Account Created';
		}
	}
?>

<html>
<head>
	<title>Create Account</title>
</head>
<body>
	<form method="post" action="create-account.php">
		<h2>Registar</h2>
		<input type="text" name="username" value="" placeholder="Username"><p />
		<input type="password" name="password" value="" placeholder="Password"><p />
		<input type="text" name="email" value="" placeholder="Email"><p />
		<input type="submit" name="create-account" value="Registar">
	</form>
</body>
</html>