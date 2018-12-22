<?php 
	include('./classes/db.php');
	include('./classes/Login.php');
	

	if (Login::isLoggedIn())
	{
		echo 'You are logged in as ' . DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['username'];

	} else 
	{
		echo 'Not Logged In';
	}
?>