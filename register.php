<?php
	include 'dbcon.php';
	$username = $_POST['regEmail'];
	$password = $_POST['regPass'];
	if($password != $_POST['regPass'])
	{
		header('Location: index.php?error=3');
	}

	$stmt = $dbh->prepare('SELECT * FROM users WHERE (username) VALUES (:username)');
	$stmt->bindParam(':username', $username);
	$result = $stmt->query();
	
	if($result->rowCount() != 0)
	{
		header('Location: index.php?error=4');
	}
	else
	{
		$stmt2 = $dbh->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
		$stmt2->bindParam(':username', $username);
		$stmt2->bindParam(':password', $password);
		$stmt2->execute();

		$stmt3 = $dbh->prepare('SELECT userid FROM users WHERE (username) VALUES (:username)');
		$stmt3->bindParam(':username', $username);
		$stmt3->query();
		session_start();
		$id = $stmt3->fetch(0);
		$_SESSION["username"] = $username;
		$_SESSION["id"] = $id;
		header('Location: index.php?registered=1');
	}
?>
