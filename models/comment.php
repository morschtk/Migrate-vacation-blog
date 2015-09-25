<?php
	function get_comments($destinationID){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM comments WHERE destinationID = ?");
		$query->bindValue(1, $destinationID);
		$query->execute();
		$comments = $query->fetchAll();

		return $comments;
	}

	function get_comment_By_ID($commentID){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM comments WHERE commentID = ?");
		$query->bindValue(1, $commentID);
		$query->execute();
		$comment = $query->fetch();

		return $comment;
	}

	function add_comment($content, $destinationID, $userName){
		global $pdo;

		$query = $pdo->prepare('INSERT INTO comments (content, postDate, destinationID, userName) VALUES (?, ?, ?, ?)');
		
		$query->bindValue(1, $content);
		$query->bindValue(2, time());
		$query->bindValue(3, $destinationID);
		$query->bindValue(4, $userName);

		$query->execute();
	}

	function edit_comment($newContent, $commentID){
		global $pdo;

		$query = $pdo->prepare('UPDATE comments SET content = ? WHERE commentID = ?');

		$query->bindValue(1, $newContent);
		$query->bindValue(2, $commentID);

		$query->execute();
	}

	function delete_comment($commentID){
		global $pdo;

		$query = $pdo->prepare('DELETE FROM comments WHERE commentID = ?');
		$query->bindValue(1, $commentID);
		$query->execute();
	}
?>