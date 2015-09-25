<?php
	function clarify($userName, $password){
		global $pdo;

		$confirmQuery = $pdo->prepare("SELECT userSalt FROM users WHERE userName = ?");
		$confirmQuery->bindValue(1, $userName);

		$confirmQuery->execute();
		$confirmSalt = $confirmQuery->fetch();
		
		$hash =  hash("sha256", $password . $confirmSalt['userSalt']);

		$query = $pdo->prepare("SELECT userID FROM users WHERE userName = ? AND userPassword = ?");
		$query->bindValue(1, $userName);
		$query->bindValue(2, $hash);

		$query->execute();

		$num = $query->rowCount();
		#$id = $query->fetch();

		return $num;
	}
?>