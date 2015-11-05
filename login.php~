<?php
	include 'dbcon.php';
	$username = $_POST['loginEmail'];
	$password = $_POST['loginPass'];
	
	$stmt = $dbh->prepare('SELECT * FROM users WHERE (username, password) VALUES (:username, :password)');
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);
	$result = $stmt->query();
	
	if($result->rowCount() == 0 )
	{
		header('Location: index.php?error=1');
	}
	else
	{
		session_start();
		$_SESSION["id"] = $result->userid
		$_SESSION["username"] = $username;
		header('Location: ToDoList.php');
	}
?>
