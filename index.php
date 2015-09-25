<?php
	require('models/connection.php');
	require('models/destination.php');
	require('models/comment.php');
	require('models/register.php');
	require('models/log.php');
	require('models/sanitize.php');

	session_start();
	$error = "";

	if (isset($_GET['action'])){
		$action = $_GET['action'];
	} else if(isset($_POST['action'])){
		$action = $_POST['action'];
	}
	else {
		$action = 'allDestinations';
	}
	//Goes to displayDestinations page
	if($action == 'allDestinations'){
		$destinations = get_all_destinations();

		include('displayDestinations.php');
	} else if ($action == 'viewDestination'){
		//Goes to the desired vacation spot
		$destinationID = $_GET['destinationID'];
		$destination = get_destination_by_destinationID($destinationID);
		$comments = get_comments($destinationID);

		//Get destination data
		$destinationName = $destination['destinationName'];
		$imageName = $destination['destinationImage'];
		$destinationContent = $destination['destinationContent'];

		//Get image URL and alternate text
		$destinationImage = 'images/' . $imageName . '.jpg';
		$imageAlt = 'Image: ' . $imageName . '.jpg';

		include('specificDestination.php');
	}else if($action == 'addComment'){
		//Adds the users comment then reloads the page
		$content = nl2br($_POST['content']);
		$cleanHTML = sanitize_html_string($content);
		$destinationID = $_POST['destinationID'];
		$userAdding = $_SESSION['user'];

		if (empty($cleanHTML)){
			$error = 'You must type a comment first.';
		}else {
			add_comment($cleanHTML, $destinationID, $userAdding);
			header('Location: ?action=viewDestination&destinationID=' . $destinationID);
		}

	}else if($action == 'editComment'){
		//loads the edit comment page
		$commentID = $_POST['commentID'];
		$comment = get_comment_By_ID($commentID);
		include('views/edit.php');

	}else if($action == 'commentEdited'){
		//Edits the desired comment and saves it to the databse then reloads the vacation spots page
		$newContent = nl2br($_POST['content']);
		$cleanHTML = sanitize_html_string($newContent);
		$commentID = $_POST['commentID'];
		$destinationID = $_POST['destinationID'];

		edit_comment($cleanHTML, $commentID);
		header('Location: ?action=viewDestination&destinationID=' . $destinationID);

	}else if($action == 'deleteComment'){
		//Deletes the desired comment
		$commentID = $_POST['commentID'];
		$destinationID = $_POST['destinationID'];
		delete_comment($commentID);
		
		header('Location: ?action=viewDestination&destinationID=' . $destinationID);

	}else if($action == 'logIn'){
		//loads the log in page
		if(isset($_POST['action'])){
			$logUserName = $_POST['logUserName'];
			$logPassword = $_POST['logPassword'];

			$num = clarify($logUserName, $logPassword);
			if($num == 1){
				//User endtered correct details
				$_SESSION['loggedIn'] = true;
				$_SESSION['user'] = $logUserName;
				header('Location: index.php');

			}else{
				//user entered false details
				$error = "Your information is incorrect!";
			}

		}
		include('views/logIn.php');
	}else if($action == 'reg'){
		//loads the registration page
		$error = "";
		if(isset($_POST['action'])){
			$regEmail = $_POST['regEmail'];
			$regUserName = $_POST['regUserName'];
			$regPassword = $_POST['regPassword'];

			$currentUser = checkUserName($userName);
			if($currentUser == 0){
				//There is no account with desired userName
				addUser($regUserName, $regPassword, $regEmail);

				$_SESSION['loggedIn'] = true;
				$_SESSION['user'] = $regUserName;
				header('Location: index.php');
			}else{
				$error = "That user name is already in use please choose another.";
			}
		}
		include('views/register.php');
	} else if($action == 'logOut'){
		//loads the logout page and logs the user out
		include('views/logout.php');
	}
?>