<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Migrate</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	</head>
	<body>
		<div class="row col-xs-12" id="container">
			<div class="col-xs-12" id="header">
				<a id="migrate" href="index.php"><h1>Migrate</h1></a>
				<?php 
					if(isset($_SESSION['loggedIn'])){ 
				?>
					<a class="authenticate" href="?action=logOut">Log out</a>
				<?php } else{ ?>
					<a class="authenticate" href="?action=logIn">Log in</a>
					<a class="authenticate" href="?action=reg">Register</a>
				<?php } ?>
			</div>
