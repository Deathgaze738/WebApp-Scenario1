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
		$stmt3 = $dbh->prepare('SELECT userid FROM users WHERE username=:username');
		$stmt3->bindParam(':username', $username);
		$stmt3->execute();
		session_start();
		$id = $stmt3->fetch();
		
		$_SESSION["username"] = $username;
		$_SESSION["id"] = $id[0];
		header('Location: ToDoList.php');
	}
?>
