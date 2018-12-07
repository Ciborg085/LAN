<?php
	include('includes/db.php');

	if (isset($_POST['create-account'])){
		echo "progress";
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username'=>$username, ':password'=>$password, ':email'=>$email));
		echo 'Account Created';
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