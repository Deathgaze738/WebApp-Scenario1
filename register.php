<?php
	include 'dbcon.php';
	$username = $_POST['regEmail'];
	$password = $_POST['regPass'];
	if($password != $_POST['regConfirmPass'])
	{
		header('Location: index.php?error=3');
	}

	$stmt = $dbh->prepare('SELECT * FROM users WHERE username=:username');
	$stmt->bindParam(':username', $username);
	$stmt->execute();
	if($stmt->rowCount() > 0)
	{
		header('Location: index.php?error=4');
	}
	else
	{
		$stmt2 = $dbh->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
		$stmt2->bindParam(':username', $username);
		$stmt2->bindParam(':password', $password);
		$stmt2->execute();

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
