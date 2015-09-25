<?php
	function get_all_destinations(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM destinations");
		$query->execute();
		$destinations = $query->fetchAll();

		return $destinations;
	}

	function get_destination_by_destinationID($destinationID){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM destinations WHERE destinationID = ?");
		$query->bindValue(1, $destinationID);
		$query->execute();
		$destination = $query->fetch();

		return $destination;
	}
?>