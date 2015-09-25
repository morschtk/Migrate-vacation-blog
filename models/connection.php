<?php
	$dsn = 'mysql:host=localhost;dbname=migrate';
	//Enter your user name and password for you phpmyadmin here
	$username = '';
	$password = '';

	try{
		$pdo = new PDO( $dsn, $username, $password);
	} catch(PDOException $e){
		exit('Database error.');
	}
?>