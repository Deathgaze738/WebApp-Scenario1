<?php
	include 'dbcon.php';
	$username = $_POST['loginEmail'];
	$password = $_POST['loginPass'];
	
	$stmt = $dbh->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);
	$stmt->execute();
	
	if($stmt->rowCount() == 0 )
	{
		header('Location: index.php?error=1');
	}
	else
	{
		session_start();
		$result = $stmt->fetch();
		$_SESSION["id"] = $result['userid'][0];
		$_SESSION["username"] = $username;
		header('Location: ToDoList.php');
	}
?>
