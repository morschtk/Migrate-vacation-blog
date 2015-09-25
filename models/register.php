<?php
	function checkUserName($userName){
		global $pdo;

		$query = $pdo->prepare('SELECT * FROM users WHERE userName = ?');
		$query->bindValue(1, $userName);

		$query->execute();

		$num = $query->rowCount();
		return $num;
	}

	function addUser($userName, $userPassword, $userEmail){
		global $pdo;
		define("MAX_LENGTH", 6);
		
		    $intermediateSalt = md5(uniqid(rand(), true));
		    $salt = substr($intermediateSalt, 0, MAX_LENGTH);
		    $cryptPassword = hash("sha256", $userPassword . $salt);

		$query = $pdo->prepare('INSERT INTO users (userName, userPassword, userSalt, userEmail, isAdmin) VALUES (?, ?, ?, ?, ?)');
		$query->bindValue(1, $userName);
		$query->bindValue(2, $cryptPassword);
		$query->bindValue(3, $salt);
		$query->bindValue(4, $userEmail);
		$query->bindValue(5, false);

		$query->execute();
	}
?>