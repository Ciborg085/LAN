<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = '';

	$dsn = 'mysql:host='. $host . 'dbname='. $dbanme;

	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	// $pdo->setAttribute();
	
	